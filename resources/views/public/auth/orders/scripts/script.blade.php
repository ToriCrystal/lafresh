<x-input type="hidden" name="route_loadmore" :value="route('order.index')" />
<x-input type="hidden" name="stop_paginate_loading" :value="$orders->isEmpty()" />
    <script>
        var pageCurrent = 1,
            statusPaginateLoading = false,
            stopPaginateLoading = $('input[name=stop_paginate_loading]').val(), 
            urlLoadMore = $(".nav-order-status .nav-item.active a").data('route');
    
        function resetLoadmore() {
            console.log('Resetting load more...');
            pageCurrent = 1;
            statusPaginateLoading = false;
            stopPaginateLoading = false;
        }
    
        function updateUrlPaginateLoading(urlLoadMore){
            console.log('Updating URL for paginate loading: ' + urlLoadMore);
            $("input[name='route_loadmore']").val(urlLoadMore);
        }
    
        function toggleBtnPaginateLoading(){
            console.log('Toggling paginate loading button...');
            $("#paginateLoading").toggle();
        }
    
        function showList(html){
            console.log('Showing list...');
            $("#orderList").html(html);
        }
    
        function handleActiveClass(el) {
            console.log('Handling active class...');
            $('.nav-order-status .nav-item a').removeClass('active');
            $(el).addClass('active');
        }
    
        function paginateLoading(page){
            var url = $("input[name='route_loadmore']").val();
            console.log('Paginate loading, page: ' + page + ', url: ' + url);
            if(url){
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {page: page}, 
                    beforeSend: function(){
                        console.log('Before sending AJAX request...');
                        statusPaginateLoading = true;
                        toggleBtnPaginateLoading();
                    },
                    success: function(data){
                        console.log('AJAX request successful, data:', data);
                        stopPaginateLoading = data.empty;
                        if(!data.empty){
                            showList(data.html);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.error('AJAX request failed:', textStatus, errorThrown);
                        stopPaginateLoading = true;
                    },
                    complete: function(){
                        console.log('AJAX request complete.');
                        statusPaginateLoading = false;
                        toggleBtnPaginateLoading();
                    }
                });
            }
        }
        
        $(document).ready(function(){
    
            $('.nav-order-status .nav-item a').click(function(e){
                e.preventDefault();
                console.log('Tab clicked...');
                handleActiveClass(this);
                var url = $(this).data('route');
                updateUrlPaginateLoading(url);
                $.ajax({
                    type: "GET",
                    url: url,
                    beforeSend: function() {
                        console.log('Before sending AJAX request for tab...');
                        $('#orderList').empty();
                        $('#loading').css('display', 'flex');
                    },
                    success: function(data) {
                        console.log('AJAX request successful for tab, data:', data);
                        $('#loading').css('display', 'none');
                        $('#orderList').html(data.html);
                        resetLoadmore();
                        stopPaginateLoading = data.empty;
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('AJAX request failed for tab:', textStatus, errorThrown);
                        $('#loading').css('display', 'none');
                        msgError('Vui lòng thử lại');
                    }ư
                });
            });
        });
        
        $(window).on('scroll', function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - $('footer').height() + 200 && !statusPaginateLoading && !stopPaginateLoading) {
                console.log('Scrolled to bottom, loading more...');
                pageCurrent++;
                paginateLoading(pageCurrent);
            }
        });
    
        $(window).on('touchmove', function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - $('footer').height() + 200 && !statusPaginateLoading && !stopPaginateLoading) {
                console.log('Touched to bottom, loading more...');
                pageCurrent++;
                paginateLoading(pageCurrent);
            }
        });
    </script>
    
    