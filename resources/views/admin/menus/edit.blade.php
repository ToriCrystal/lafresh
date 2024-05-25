@extends('admin.layouts.master')
@push('libs-css')
<link rel="stylesheet" href="{{ asset('public/libs/nestable/jquery.nestable.min.css') }}">
@endpush
@push('custom-css')
<style>
    .dd-handle{
        cursor: move;
    }
    .dd-item{
        position: relative;
    }
    .dd-item .pull-right{
        position: absolute;
        right: 0;
        top: 0;
        display: flex;
        align-items: center;
        gap: 10px;
        height: 30px;
    }
    .dd-item .pull-right .title-type{
        color: #182433;
        font-size: 12px;
        font-weight: 300;
    }
    .show-item-details{
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f6f8fb;
        border-bottom-right-radius: 4px;
        border-right: 1px solid #ccc;
        border-left: 1px solid #dce1e7;
        border-top-right-radius: 4px;
        color: #6c7a91;
        text-align: center;
        width: 43px;
        height: 28px;
        font-size: 18px;
    }
    .show-item-details:hover{
        text-decoration: none;
    }
    .item-details{
        padding: 10px;
        border: 1px solid #ccc;
    }
    .dd-item .panel-collapse{
        width: 100%;
    }
</style>
@endpush
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                    class="text-muted">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item text-muted">{{ __('Giao diện') }}</li>
                            <li class="breadcrumb-item text-muted">
                                <a href="{{ route('admin.menu.index') }}" class="text-muted">{{ __('Menu') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Sửa') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <x-form :action="route('admin.menu.update')" type="put" :validate="true">
                <x-input type="hidden" name="menu[id]" :value="$menu->id" />
                <x-input type="hidden" name="json_menu_items" />
                <div class="row justify-content-center">
                    @include('admin.menus.forms.edit-left')
                    @include('admin.menus.forms.edit-right')
                </div>
            </x-form>
        </div>
    </div>
@endsection
@push('libs-js')
<script src="{{ asset('public/libs/nestable/jquery.nestable.js') }}"></script>
@endpush
@push('custom-js')
<input type="hidden" name="load_menu_item" value="{{ json_encode($menu_items) }}" />
<script>
    $(document).ready(function(){

        $('input[name=json_menu_items]').val(JSON.stringify($('.dd').nestable('asNestedSet')));

        $('.btn-add-item-custom-link').click(function(){
            var target = $(this).data('target');
            var title = $(target).find('input[name="custom_link_title"]').val();
            var url = $(target).find('input[name="custom_link_url"]').val();
            var json = {
                'id': generateUID('U'),
                'title': title,
                'url': url,
                'reference_type': '',
                'titleType': 'Link',
                'reference_id': '',
            };
            // console.log(json);
            $('.dd').nestable('add', json);
            $('input[name=json_menu_items]').val(JSON.stringify($('.dd').nestable('asNestedSet')));
            $(target).find('input[name="custom_link_title"]').val('');
            $(target).find('input[name="custom_link_url"]').val('/');
        });

        $('.btn-add-item').click(function(){
            var inputChecked = $($(this).data('target')).find('input:checked');
            $.each(inputChecked, function(i, e){
                $('.dd').nestable('add', {
                    'id': generateUID('U'),
                    'title': $(e).data('title'),
                    'url': '',
                    'reference_type': $(e).data('reference-type'),
                    'titleType': $(e).data('titletype'),
                    'reference_id': $(e).val(),
                });
                $(e).prop('checked', false);
            })
            // console.log(json);
            $('input[name=json_menu_items]').val(JSON.stringify($('.dd').nestable('asNestedSet')));
        });
    });

    $(document).on('click', '.btn-delete-item-menu', function(e){
        if(confirm('Bạn có chắc chắn muốn xóa?')){
            var id = $(this).data('id');
            $('.dd').nestable('remove', id);
            $('input[name=json_menu_items]').val(JSON.stringify($('.dd').nestable('asNestedSet')));
        }
    });
    // console.log(JSON.parse($('input[name=load_menu_item]').val()));
    var json = JSON.parse($('input[name=load_menu_item]').val());
    // $.each(json, function (indexInArray, valueOfElement) {

    //     if(json[indexInArray].children.length == 0){
    //         delete json[indexInArray].children;
    //     }
    // });
    // console.log(json);
    $('.dd').nestable({
        'json': json,
        maxDepth: 2,
        callback: function(l,e){
            // console.log(l, e);
            $('input[name=json_menu_items]').val(JSON.stringify($(l).nestable('asNestedSet')));
        },
        itemRenderer: function(item_attrs, content, children, options) {
            // console.log(item_attrs);
            item_attrs_string = ' class="' + item_attrs['class'] + '" ' + 'data-id="' + item_attrs['data-id'] + '" ';

            var html = '<' + options.itemNodeName + item_attrs_string + '>';
            html += '<' + options.handleNodeName + ' class="' + options.handleClass + '">';
            html += '<' + options.contentNodeName + ' class="' + options.contentClass + '">';
            html += content;
            html += '</' + options.contentNodeName + '>';

            html += '</' + options.handleNodeName + '>';
            html += `<div class="pull-right">
                <span class="title-type">${item_attrs['data-titleType']}</span>
                <a href="#menuItem${item_attrs['data-id']}" class="show-item-details" data-bs-toggle="collapse" data-parent="#accordion" aria-expanded="false>
                    <span class="icon-tabler-wrapper icon-sm">
                        <i class="ti ti-chevron-down"></i>
                    </span>
                </a>
            </div>`;
            html += `<div id="menuItem${item_attrs['data-id']}" class="panel-collapse collapse">
                <div class="item-details">
                    <div class="mb-3">
                        <label>Tiêu đề</label>
                        <input type="text" class="form-control" name="title[${item_attrs['data-id']}]" value="${content}"/>
                    </div>`;

            if(item_attrs['data-reference_type'] == 'null' || item_attrs['data-reference_type'] == ''){
                html += `<div class="mb-3">
                        <label>Đường dẫn</label>
                        <input type="text" class="form-control" name="url[${item_attrs['data-id']}]" value="${item_attrs['data-url']}"/>
                </div>`;
            }

            html += `
                <input type="hidden" name="reference_type[${item_attrs['data-id']}]" value="${item_attrs['data-reference_type']}"/>
                <input type="hidden" name="reference_id[${item_attrs['data-id']}]" value="${item_attrs['data-reference_id']}"/>
            `;

            html += `<div class="d-flex justify-content-end gap-3">
                    <button type="button" class="btn btn-sm btn-danger btn-delete-item-menu" data-id="${item_attrs['data-id']}">Xóa</button>
                </div>
            </div></div>`;
            html += children;
            html += '</' + options.itemNodeName + '>';

            return html;
        },
        contentCallback: function(item) {
            return item.title ? item.title : item.id;
        },
        emptyClass: 'no'
    });
</script>
@endpush
