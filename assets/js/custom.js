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
jQuery('.jobPositionIcon,.jobPosition').on("click",function(){
    jQuery('.jobPositionAccordion').toggleClass('accordion--expanded');
    jQuery(this).parent('div').toggleClass('expanded');
});

// Send ajax request for filter job title
var jobInfo = {
    filterTitleList         : [],
    filterCityList          : [],
    filterPositionTypeList  : [],
    filterPositionList      : [],
    jobSearchKeyword        : '',
    pageURL                 : egens_frontend_ajax_handler_params.page_url,
}

// Job Title Input
jQuery('.jobTitleInput').on("click",function(){
    var job_id = jQuery(this).val();
    if( !jobInfo.filterTitleList.includes(job_id) ){
        jobInfo.filterTitleList.push(job_id);
        filterJobAjaxHandler();
    }else{
        var filterTitleList = jobInfo.filterTitleList.filter(item => item !== jQuery(this).val());
        jobInfo.filterTitleList = filterTitleList;
        filterJobAjaxHandler();
    }
});

// Job Search 
jQuery('#jobSearchForm').submit(function(event){
    event.preventDefault();
    var search_keyword = jQuery('.job_search_value').val();
    jobInfo.jobSearchKeyword = search_keyword;
    filterJobAjaxHandler();
    console.log( jobInfo );
});

// Job City Input
jQuery('.jobCityInput').on("click",function(){
    var cityName = jQuery(this).val();
    if( !jobInfo.filterCityList.includes(cityName) ){
        jobInfo.filterCityList.push(cityName);
        filterJobAjaxHandler();
    }else{
        var filterCityList = jobInfo.filterCityList.filter(item => item !== jQuery(this).val());
        jobInfo.filterCityList = filterCityList;
        filterJobAjaxHandler();
    }
});

// Job Postion Type Input Filter
jQuery('.jobPositionTypeInput').on("click",function(){
    var positionType = jQuery(this).val();
    if( !jobInfo.filterPositionTypeList.includes(positionType) ){
        jobInfo.filterPositionTypeList.push(positionType);
        filterJobAjaxHandler();
    }else{
        var filterPositionTypeList = jobInfo.filterPositionTypeList.filter(item => item !== jQuery(this).val());
        jobInfo.filterPositionTypeList = filterPositionTypeList;
        filterJobAjaxHandler();
    }
});

// Job Postion Input Filter
jQuery('.jobPositionInput').on("click",function(){
    var position = jQuery(this).val();
    if( !jobInfo.filterPositionList.includes(position) ){
        jobInfo.filterPositionList.push(position);
        filterJobAjaxHandler();
    }else{
        var filterPositionList = jobInfo.filterPositionList.filter(item => item !== jQuery(this).val());
        jobInfo.filterPositionList = filterPositionList;
        filterJobAjaxHandler();
    }
});

// Paginate Jobs
jQuery('.job_paginate').on("click",function(event){
    event.preventDefault();
    var page_number =  jQuery(this).text();
    getJobByPagination(page_number,jQuery(this));
    jQuery('html, body').animate({
        scrollTop: jQuery("#mainJobArchive").offset().top
    });

});

// Get Job by Pagination

function getJobByPagination(page_number,selector) {
    var data = {
        'action'		    : 'get_job_by_pagination',
        'page_number' 	    : page_number,
    };
    jQuery.ajax({ // you can also use $.post here
        url : egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
        data : data,
        type : 'POST',
        beforeSend: function() {
            jQuery('.js-jobs-container').addClass('container-loader is-loading');
        },
        success : function( data ){
          jQuery('#jobArchiveList').empty().html(data);
          jQuery('.job_paginate').each(function(){
            jQuery(this).removeClass('current');
          });

          selector.addClass('current');
          jQuery('.js-jobs-container').removeClass('container-loader is-loading');
        }
    });
} 

// Main Job Post Handler by ajax
function filterJobAjaxHandler(){
    var data = {
        'action'		    : 'get_job_by_filter_title_list',
        'jobInfo' 	        : jobInfo,
    };
    jQuery.ajax({ // you can also use $.post here
        url : egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
        data : data,
        type : 'POST',
        beforeSend: function() {
            jQuery('.js-jobs-container').addClass('container-loader is-loading');
        },
        success : function( data ){
          jQuery('#jobArchiveList').empty().html(data);
          jQuery('.js-jobs-container').removeClass('container-loader is-loading');
          jQuery('#jobPostPagination').css('display','none');
        }
    });
}

jQuery(window).on('load', function(){
    console.log( jobInfo );
    jQuery('.pagination > .job_paginate:first').addClass('current');
    // jQuery('head').append('<style> .jobTitleLabel::before{ content:""; } </style>');
    console.log('Working');
});