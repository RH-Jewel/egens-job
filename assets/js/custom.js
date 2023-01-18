// jQuery(".js-expand-filter").on("click", function (t) {
//     alert('hello');
//     // var e = n(t.currentTarget).parent();
//     // e.hasClass("expanded") ? e.removeClass("expanded").find(".accordion-expandable").removeClass("accordion--expanded") : (n(".accordion__inner").each(function (t, e) {
//     //     n(e).removeClass("expanded").find(".accordion-expandable").removeClass("accordion--expanded")
//     // }), e.addClass("expanded").find(".accordion-expandable").addClass("accordion--expanded"))
// });
jQuery('.jobTitleIcon,.jobTitle').on("click",function(){
    jQuery('.jobTitleAccordion').toggleClass('accordion--expanded');
    jQuery(this).parent('div').toggleClass('expanded');
});
jQuery('.jobCityIcon,.jobCity').on("click",function(){
    jQuery('.jobCityAccordion').toggleClass('accordion--expanded');
    jQuery(this).parent('div').toggleClass('expanded');
});
jQuery('.jobPositionTypeIcon,.jobPositionType').on("click",function(){
    jQuery('.jobPositionTypeAccordion').toggleClass('accordion--expanded');
    jQuery(this).parent('div').toggleClass('expanded');
});

// Send ajax request for filter job title
var jobInfo = {
    filterTitleList : [],
}

jQuery('.jobTitleInput').on("click",function(){
    var job_id = jQuery(this).val();
    if( !jobInfo.filterTitleList.includes(job_id) ){
        jobInfo.filterTitleList.push(job_id);
        var data = {
            'action'		    : 'get_job_by_filter_title_list',
            'filterTitleList' 	: jobInfo.filterTitleList,
        };
        jQuery.ajax({ // you can also use $.post here
            url : egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend: function() {
                jQuery('#response').text('Loading...');
            },
            success : function( data ){
              jQuery('#jobArchiveList').empty().html(data);
            }
        });
    }else{
        var filterTitleList = jobInfo.filterTitleList.filter(item => item !== jQuery(this).val());
        jobInfo.filterTitleList = filterTitleList;
        // console.log( jobInfo );
    }
});
// jQuery(window).on('load', function(){
//     console.log( jobInfo );
//     jQuery('.jobTitleLabel').before().css('content','');
// });