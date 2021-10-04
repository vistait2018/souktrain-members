 
            r = function(){
                $('.dataTable').dataTable()
            }

            $(function(){
                r();
               var winHeight =  $(window).height();
                var $loading = $(
                    '<div id="loadingDiv" style="background: rgba(20,20,20,0.6); position: fixed;width: 100%; height: 100%; z-index: 9999999999">' +
                    '<div id="loadingBox" style="margin: '+(winHeight/2 -100) +'px auto; width: 100px;height: 100px;">' +
                    "<div class='uil-squares-css' style='transform:scale(0.5);'><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div><div><div></div></div></div>" +
                    '</div></div>').prependTo('body');
                $loading.hide();
                $(window).resize(function(){
                    var winHeight =  $(window).height();
                    $('#loadingBox').css({'margin-top':(winHeight/2 -100)})
                })
                $(document)
                    .ajaxStart(function () {
                        $loading.show();
                    })
                    .ajaxStop(function () {
                        $loading.hide();
                    });
					
				

                var anchor_handler = function(e){
                    e.preventDefault();
                    var obj = $(this);
                    var url = (obj.attr('href'))? obj.attr('href') : '';
                    var method =  'get';
                    var dst = (obj.attr('data-dst'))? obj.attr('data-dst'): '#content';
                    var data = {}

                    var title = (obj.attr('title'))? obj.attr('title'): url;
                    var options = {
                        url: url,
                        method: method,
                        dst: dst,
                        data: data
                    }

                    do_ajax(options)

                    history.pushState(options, title, "<?= base_url().'#'?>"+url);


                }

                var form_handler = function(e){
                    e.preventDefault();
                    var obj = $(this)
                    var url = (obj.attr('action'))? obj.attr('action'): '';
                    var method = (obj.attr('method'))? obj.attr('method'): 'get';
                    var dst = (obj.attr('data-dst'))? obj.attr('data-dst'): '#content';
                    var attach = (obj.attr('data-attach'))? obj.attr('data-attach'): 'replace';
                    var data = obj.serializeArray();


                    var title = (obj.attr('title'))? obj.attr('title'): url;
                    var options = {
                        url: url,
                        method: method,
                        dst: dst,
                        data: data,
                        attach:attach,
                        cache: false
                    }
                    do_ajax(options)

                    history.pushState(options, title, "<?= base_url().'#'?>"+url);
                }
                window.addEventListener('popstate', function(e) {
                    var options = e.state;
					
                    if (options == null) {

                    } else {
                        do_ajax(options)
                    }
                });
                $(document).on('click', 'a[data-ajax=true]', anchor_handler);
                $(document).on('submit', 'form[data-ajax=true]', form_handler);
                $(document).on('change', '#selectAll', function() {//select all check boxes
                    var checkboxes = $(this).closest('form').find(':checkbox');
                    if($(this).is(":checked:not([disabled])")) {
                        checkboxes.prop('checked', true);
                    } else {
                        checkboxes.prop('checked', false);
                    }
                });

                Morris.Area({
                    element: 'graph_line',
                    xkey: ['monthly'],
                    ykeys: ['total_amount'],
                    labels: ['Amount N'],
                    hideHover: 'auto',
                    lineColors: ['#5c24b9', '#34495E', '#ACADAC', '#44dbbe'],
                    data:
                    <?= json_encode($monthly_transactions)?>

                    /*[
                        {year: '2012', value: 20},
                        {year: '2013', value: 10},
                        {year: '2014', value: 5},
                        {year: '2015', value: 5},
                        {year: '2016', value: 20}
                    ]*/,
                    resize: true
                });


            })
			$(function(e){
				var url = location.hash; //alert(url);
				if(url){
				var options = {
                        url: url.replace("#", ""),
                        method: 'get',
                        cache: false,
						dst: '#content'
                    }
                    do_ajax(options);
				}
			})
            function do_ajax(options){
                var dest = $(options.dst);
                $.ajax({
                    cache: false,
                    url: options.url,
                    type: options.method,//type of posting the data
                    data: options.data,
                    success: function (data) {
                        switch (options.attach){
                            case 'prepend': dest.prepend(data); break;
                            case 'append': dest.append(data); break;
                            case 'replace': dest.html(data); break;
                            default: dest.html(data);
                        }
                        r();
                    },
                    error: function(xhr, ajaxOptions, thrownError){
                       // alert(ajaxOptions)
                        switch(xhr.status){
                            case 401: window.location.reload(); break;
                            default:
                                dest.prepend('' +
                                    '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top: 50px">'+
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                    '<span aria-hidden="true">&times;</span></button>'+
                                    '<strong>An Error Occurred! </strong> '+thrownError+ '</div>');
                                console.log(xhr);
                        }
                        //what to do in error
                    },
                    timeout : 15000//timeout of the ajax call
                });
            }
       