function AjaxService(type) {
    this.url = type;
    this.path = '/analytics';
    this.colors=['#2962FF', '#D50000', '#FFAB00', '#AA00FF', '#4CAF50'];
    this.colorClasses=['progress-bar-aqua', 'progress-bar-green', 'progress-bar-yellow', 'progress-bar-red', 'progress-bar-purple'];

    this.commaSeparateNumber=function (val) {
        while (/(\d+)(\d{3})/.test(val.toString())){
            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
        }
        return val;
    }
    this.getMonth=function (date_string) {
        var from = date_string.split("-");
        return from[1];
    }
    this.getYear=function (date_string) {
        var from = date_string.split("-");
        return from[0];
    }
    // Load the number of total sales.
    this.loadTotalSales = function (start_date, end_date) {
        var ajaxservice=this;
        $.ajax({
            type: "GET",
            url: this.path + "/SalesforceSales/total_sales?start_date=" + start_date + "&end_date=" + end_date,
            success: function (data) {
                var info = $.parseJSON(data);
                if(info[2][0]['sum(sold_price)']!=null)
                {
                    var sale=ajaxservice.commaSeparateNumber(info[2][0]['sum(sold_price)']);
                    //console.log('$'+info[2][0]['sum(sold_price)']);
                    $('#total-sales').empty().html('$'+sale);
                }
                else
                    $('#total-sales').empty().html("<small class='text-warning'>Data Not Found</small>");
            },
            error: function (data) {
                $('#total-sales').empty().html("<small class='text-danger'>Some Error occured</small>");
            }
        });
    };

    // Load the number of total leads.
    this.loadTotalLeads = function (start_date, end_date) {

        $.ajax({
            type: "GET",
            url: this.path +"/SalesforceLeads/total_leads?start_date=" + start_date + "&end_date=" + end_date,
            success: function (data) {
                var info = $.parseJSON(data);
                if(info[2][0]['sum(appointment_count)']!=null)
                    $('#total-leads').empty().html(info[2][0]['sum(appointment_count)']);
                else
                    $('#total-leads').empty().html("<small class='text-warning'>Data Not Found</small>");
            },
            error: function (data) {
                $('#total-leads').empty().html("<small class='text-danger'>Some Error occured</small>");
            }
        });
    };


    // // Load the number of total leads.
    // this.loadTotalMediumOrganicTrafic = function (start_date, end_date) {
    //     $.ajax({
    //         type: "GET",
    //         url: this.path +"/AnalyticMediumReports/total_mediums?filter_type=organic_searches&start_date=" + start_date + "&end_date=" + end_date,
    //         success: function (data) {
    //             var info = $.parseJSON(data);
    //             if(info[2][0]['sum(organic_searches)']!=null)
    //                 $('#total-medium').empty().html(info[2][0]['sum(organic_searches)']);
    //             else
    //                 $('#total-medium').empty().html("<small class='text-warning'>Data Not Found</small>");
    //         },
    //         error: function (data) {
    //             $('#total-medium').empty().html("<small class='text-danger'>Some Error occured</small>");
    //         }
    //     });
    //
    // };//
    // Load the number of total leads.
    this.loadTotalSourceOrganicTrafic = function (start_date, end_date) {

        $.ajax({
            type: "GET",
            url: this.path +"/AnalyticSourceReports/total_sources?filter_type=new_users&start_date=" + start_date + "&end_date=" + end_date,
            success: function (data) {
                var info = $.parseJSON(data);
                if(info[2][0]['sum(new_users)']!=null)
                    $('#total-source').empty().html(info[2][0]['sum(new_users)']);
                else
                    $('#total-source').empty().html("<small class='text-warning'>Data Not Found</small>");
            },
            error: function (data) {
                $('#total-source').empty().html("<small class='text-danger'>Some Error Occured</small>");
            }
        });

    };


    // Load the number of total leads.
    this.loadTotalBirdEys = function (start_date, end_date) {

        $.ajax({
            type: "GET",
            url: this.path +"/Birdeyes/total-birdeyes?start_date="+start_date+"&end_date="+end_date,
            success: function (data) {
                var info = $.parseJSON(data);
                if(info[0][0]['COUNT(business_name)']!=null)
                    $('#total-birdeyes').empty().html(info[0][0]['COUNT(business_name)']);
                else
                    $('#total-birdeyes').empty().html("<small class='text-warning'>Data Not Found</small>");
            },
            error: function (data) {
                $('#total-birdeyes').empty().html("<small class='text-danger'>Some Error occured</small>");
            }
        });

    };
    this.isEmpty = function (data) {
        for (var len = 0; len < data.length; len++) {
            if (data[len].length == 0)
                return 1;
            else
                return 2;
        }
    }

    this.generateData = function (data, total_dates,date_class) {
        var source = new Array();

        for (var index = 0; index < total_dates.length; index++) {
            source[index] = 0;
        }

        for (var i = 0; i < data.length; i++) {

            for (var j = 0; j < total_dates.length; j++) {

                if (data[i][date_class] == total_dates[j]) {
                    source[j] = data[i].filter;
                }

            }
        }

        //console.log(JSON.stringify(source));

        return source;

    }
    this.createSideBars=function (side_data_strip,datas,source_index,data_limit,progress_percentage,symbol) {
        datas[source_index]['filter']=this.commaSeparateNumber(datas[source_index]['filter']);
        if(symbol == '$')
        {
            datas[source_index]['filter'] = symbol +' '+ datas[source_index]['filter'].toString();
            data_limit = symbol + data_limit;
        }
      var row=  side_data_strip + ('<div class="progress-group">' +
                                        '<span class="progress-text">' +
                                        datas[source_index]['source'] +
                                        '</span>' +
                                        '<span class="progress-number">' +
                                        '<b>' +
                                        datas[source_index]['filter'] +
                                        // '</b>/' +
                                        // data_limit +
                                        '</b></span>' +
                                        '<div class="progress sm">' +
                                        '<div class="progress-bar ' + this.colorClasses[source_index] + '" style="width: ' + progress_percentage + '%; background-color:' + this.colors[source_index] + '"></div>' +
                                        '</div>' +
                                        '</div>');
      return row;
    }
    this.createBottomBars=function (bottom_info_data,source_index,datas,bottom_index) {
        var row=bottom_info_data + ('<div class="col-sm-3 col-xs-6">' +
                                            '<div class="description-block">' +
                                            '<h5 class="description-header">' +
                                            datas[bottom_index].filter +
                                            '</h5>' +
                                            '<span class="description-text">' +
                                            datas[bottom_index].source.toUpperCase() +
                                            '</span>' +
                                            '</div>' +
                                            '</div>');
        return row;
    }

    this.getDates = function (start_date,end_date)
    {

        var date1 = new Date(end_date);
        var date2 = new Date(start_date);
        var day;
      //  var between = [(date1.getDate() > 9 ? date1.getDate() : '0'+date1.getDate()  ) + '-' + ((date1.getMonth() + 1) > 9 ? (date1.getMonth() + 1) : '0' + (date1.getMonth() + 1)) + '-' +  date1.getFullYear()];
        var between = [ date1.getFullYear() + '-' + ((date1.getMonth() + 1) > 9 ? (date1.getMonth() + 1) : '0' + (date1.getMonth() + 1)) + '-' +  (date1.getDate() > 9 ? date1.getDate() : '0'+date1.getDate()  )];

        while(date2 <= date1) {
            day = date1.getDate()
            date1 = new Date(date1.setDate(--day));
            between.push((date1.getFullYear() + '-' + ((date1.getMonth() + 1) > 9 ? (date1.getMonth() + 1) : '0' + (date1.getMonth() + 1)) + '-' +  (date1.getDate() > 9 ? date1.getDate() : '0'+date1.getDate())) );
        }
        between.sort();
        console.log(between);
        return between;

    }

///Common function for drawing graphs
    this.loadChart = function (url,start_date, end_date,date_class,loader,loading_error,chart_div,chart_id,filter_date_range,top_five,top_five_list,bottom_data_array,bottom_data_class,box,footer,symbol) {


        var ajaxservice = this;
        $.ajax({
            type: "GET",
            url: this.path +url+"?filter_type=sold_price&agency_id=3&start_date=" + start_date + "&end_date=" + end_date,

            success: function (data) {

                var info = $.parseJSON(data);
                var isEmpty = ajaxservice.isEmpty(info);
               // console.log(isEmpty);
                //Checking if the Data Exists or not
                if (isEmpty == 1)//if Data donot exists
                {
                    $('.'+loader).hide();
                    $('.'+loading_error).show();
                    $('.'+loading_error).html('We don\'t have the data you need ,Please try for some other Date range');
                }
                else    //if Data Exists
                {
                    //Hiding the Loader
                    $('.'+loader).hide();
                    //Show the Box
                    $('#'+box).show();
                    $('#'+footer).show();
                    //Done Showing Box
                    //var total_dates = ajaxservice.getDates(start_date,end_date);//info[0];// all dates to plot
                    var total_dates = info[0];// all dates to plot
                    var sales = new Array();

                    var datasets = new Array();
                    //var source_colors = ['#2962FF', '#D50000', '#FFAB00', '#AA00FF', '#4CAF50'];

                    for (var j = 0; j < info[2].length; j++) {
                        //soures[i] = new Array();
                        sales[j] = ajaxservice.generateData(info[2][j], total_dates,date_class)
                        datasets[j] = {
                            label: info[1][j].source,
                            data: sales[j],
                            backgroundColor: ajaxservice.colors[j]
                            // backgroundColor: getRandomColor()
                        }
                    }

                    $('.'+chart_div).empty();
                    $('.'+chart_div).html('<canvas id='+chart_id+' width="400px" height="200px"></canvas>');


                    //console.log(top_source_5.length);
                    var ctx = document.getElementById(chart_id).getContext('2d');
                    var chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: info[0],
                            datasets: datasets
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    stacked: true
                                }],
                                yAxes: [{
                                    stacked: true
                                }]
                            }
                        }
                    });

                    var highest_filter_data = info[1][0].filter;
                    var a = info[1][4].source;
                    //var side_progress_color = ['progress-bar-aqua', 'progress-bar-green', 'progress-bar-yellow', 'progress-bar-red', 'progress-bar-purple'];
                    var data_limit = Math.ceil(highest_filter_data / 100) * 100;
                    var side_data_strip = '';
                    var datas = new Array();
                    var filter_type = info[5].toUpperCase();
                    filter_type = filter_type.replace('_', ' ');
                    filter_type = filter_type.replace('_', ' ');
                    $("#"+filter_date_range).html(filter_type + "&nbsp;&nbsp;&nbsp;&nbsp;" + info[3] + "&nbsp;to&nbsp;" + info[4]);
                    //$(".box-title").html(filter_type + "&nbsp;&nbsp;Report");
                    $("#"+top_five).html("Top 5 " + filter_type);
                    for (var source_index = 0; source_index < info[1].length; source_index++) {
                        var progress_percentage = (info[1][source_index].filter / highest_filter_data) * 100;
                        datas[source_index] = info[1][source_index];
                        side_data_strip = ajaxservice.createSideBars(side_data_strip,datas,source_index,data_limit,progress_percentage,symbol);
                    }
                    //var progress_percentage=(info[1][0].sessions /  highest_filter_data)*100;
                    $("."+top_five_list).html(side_data_strip);
                    var bottom_info_data = '';
                    //console.log(info[6][].sessions);
                    //var bottom_info_array = ['lead_count', 'appointment_count', 'sale_count', 'sold_price'];
                    for (var bottom_index = 0; bottom_index < 5; bottom_index++) {
                        if (info[5] != bottom_data_array[bottom_index]) {
                            bottom_info_data = ajaxservice.createBottomBars(bottom_info_data,source_index,datas,bottom_index);
                        }
                    }
                    $("."+bottom_data_class).html(bottom_info_data);
                    // $('.'+loader).hide();
                }
            },
            error: function (data) {
                $('.'+loader).hide();
                $('.'+loading_error).show();
                $('.'+loading_error).html('Some error occured while loading the Data<br><br>Please try again');
            }
        });
    }
    // this.loadMonthwise=function () {
    //     var ajaxservice = this;
    //     $.ajax({
    //         type: "GET",
    //         url: this.path +url+"?filter_type=sold_price&agency_id=3&start_date=" + start_date + "&end_date=" + end_date,
    //
    //         success: function (data) {
    //
    //             var info = $.parseJSON(data);
    //             var isEmpty = ajaxservice.isEmpty(info);
    //             // console.log(isEmpty);
    //             //Checking if the Data Exists or not
    //             if (isEmpty == 1)//if Data donot exists
    //             {
    //                 $('.'+loader).hide();
    //                 $('.'+loading_error).show();
    //                 $('.'+loading_error).html('We don\'t have the data you need ,Please try for some other Date range');
    //             }
    //             else    //if Data Exists
    //             {
    //                 //Hiding the Loader
    //                 $('.'+loader).hide();
    //                 //Show the Box
    //                 $('#'+box).show();
    //                 $('#'+footer).show();
    //                 //Done Showing Box
    //                 var total_dates = info[0];// all dates to plot
    //                 var sales = new Array();
    //
    //                 var datasets = new Array();
    //                 //var source_colors = ['#2962FF', '#D50000', '#FFAB00', '#AA00FF', '#4CAF50'];
    //
    //                 for (var j = 0; j < info[2].length; j++) {
    //                     //soures[i] = new Array();
    //                     sales[j] = ajaxservice.generateData(info[2][j], total_dates,date_class)
    //                     datasets[j] = {
    //                         label: info[1][j].source,
    //                         data: sales[j],
    //                         backgroundColor: ajaxservice.colors[j]
    //                         // backgroundColor: getRandomColor()
    //                     }
    //                 }
    //
    //                 $('.'+chart_div).empty();
    //                 $('.'+chart_div).html('<canvas id='+chart_id+' width="400px" height="200px"></canvas>');
    //
    //
    //                 //console.log(top_source_5.length);
    //                 var ctx = document.getElementById(chart_id).getContext('2d');
    //                 var chart = new Chart(ctx, {
    //                     type: 'bar',
    //                     data: {
    //                         labels: info[0],
    //                         datasets: datasets
    //                     },
    //                     options: {
    //                         scales: {
    //                             xAxes: [{
    //                                 stacked: true
    //                             }],
    //                             yAxes: [{
    //                                 stacked: true
    //                             }]
    //                         }
    //                     }
    //                 });
    //
    //                 var highest_filter_data = info[1][0].filter;
    //                 var a = info[1][4].source;
    //                 //var side_progress_color = ['progress-bar-aqua', 'progress-bar-green', 'progress-bar-yellow', 'progress-bar-red', 'progress-bar-purple'];
    //                 var data_limit = Math.ceil(highest_filter_data / 100) * 100;
    //                 var side_data_strip = '';
    //                 var datas = new Array();
    //                 var filter_type = info[5].toUpperCase();
    //                 filter_type = filter_type.replace('_', ' ');
    //                 filter_type = filter_type.replace('_', ' ');
    //                 $("#"+filter_date_range).html(filter_type + "&nbsp;&nbsp;&nbsp;&nbsp;" + info[3] + "&nbsp;to&nbsp;" + info[4]);
    //                 //$(".box-title").html(filter_type + "&nbsp;&nbsp;Report");
    //                 $("#"+top_five).html("Top 5 " + filter_type);
    //                 for (var source_index = 0; source_index < info[1].length; source_index++) {
    //                     var progress_percentage = (info[1][source_index].filter / highest_filter_data) * 100;
    //                     datas[source_index] = info[1][source_index];
    //                     side_data_strip = ajaxservice.createSideBars(side_data_strip,datas,source_index,data_limit,progress_percentage,symbol);
    //                 }
    //                 //var progress_percentage=(info[1][0].sessions /  highest_filter_data)*100;
    //                 $("."+top_five_list).html(side_data_strip);
    //                 var bottom_info_data = '';
    //                 //console.log(info[6][].sessions);
    //                 //var bottom_info_array = ['lead_count', 'appointment_count', 'sale_count', 'sold_price'];
    //                 for (var bottom_index = 0; bottom_index < 5; bottom_index++) {
    //                     if (info[5] != bottom_data_array[bottom_index]) {
    //                         bottom_info_data = ajaxservice.createBottomBars(bottom_info_data,source_index,datas,bottom_index);
    //                     }
    //                 }
    //                 $("."+bottom_data_class).html(bottom_info_data);
    //                 // $('.'+loader).hide();
    //             }
    //         },
    //         error: function (data) {
    //             $('.'+loader).hide();
    //             $('.'+loading_error).show();
    //             $('.'+loading_error).html('Some error occured while loading the Data<br><br>Please try again');
    //         }
    //     });
    //
    // }
}

