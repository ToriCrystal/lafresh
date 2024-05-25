<x-input type="hidden" name="route_loadmore" :value="route('order.index')" />
<x-input type="hidden" name="stop_paginate_loading" :value="$orders->isEmpty()" />
<script>

    var pageCurrent = 1,
        statusPaginateLoading = false,
        stopPaginateLoading = $('input[name=stop_paginate_loading]').val(), 
        urlLoadMore = $(".job-status-nav-tabs .nav-item.active").data('route');

    function resetLoadmore() {

        pageCurrent = 1;
        statusPaginateLoading = false;
        stopPaginateLoading = false;
    }

    function updateUrlPaginateLoading(urlLoadMore){
        $("input[name='route_loadmore']").val(urlLoadMore);
    }

    function toggleBtnPaginateLoading(){
        $("#paginateLoading").toggle();
    }

    function showList(html){
        $("#orderList").append(html);
    }

    function handleActiveClass(el) {
        $('.nav-order-status .nav-item a').removeClass('active');
        $(el).addClass('active');
    }

    function paginateLoading(page){
        var url = $("input[name='route_loadmore']").val();
        console.log(url + '?page=' + page);
        if(url){
            $.ajax({
                type: "GET",
                url: url,
                data: {page: page}, 
                beforeSend: function(){

                    statusPaginateLoading = !statusPaginateLoading;

                    toggleBtnPaginateLoading();
                },
                success: function(data){

                    stopPaginateLoading = data.empty;

                    if(!data.empty){

                        showList(data.html);
                    }
                },
                error: function(){

                    stopPaginateLoading = true;
                },
                complete: function(){

                    statusPaginateLoading = !statusPaginateLoading;

                    toggleBtnPaginateLoading();
                }
            });
        }
    }
    
    $(document).ready(function(){

        $('.nav-order-status .nav-item a').click(function(e){

            e.preventDefault();

            handleActiveClass(this);

            var url = $(this).attr('href');

            updateUrlPaginateLoading(url);

            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {

                    $('#orderList').empty();

                    $('#loading').css('display', 'flex');
                },
                success: function(data) {

                    $('#loading').css('display', 'none');
                },
            }).done(function(response) {

                $('#orderList').append(response.html);

                resetLoadmore();

                stopPaginateLoading = response.empty;

            }).fail(function(response) {
                msgError('Vui lòng thử lại')
            }).always(function(){
                
            })
        });
    });
    
    window.addEventListener('wheel', function(e) {
      if (e.deltaY > 0) {
        if($(this).scrollTop() + $(this).height() >= $(document).height() - $('footer').height() + 200 && !statusPaginateLoading && !stopPaginateLoading){
            pageCurrent ++;
            paginateLoading(pageCurrent);
        }
      }
    });

    window.addEventListener('touchmove', function(e) {
        // Xử lý sự kiện cuộn trang bằng cách vuốt trên thiết bị di động
        if($(this).scrollTop() + $(this).height() >= $(document).height() - $('footer').height() + 200 && !statusPaginateLoading && !stopPaginateLoading){
            pageCurrent ++;
            paginateLoading(pageCurrent);
        }
    });

</script>