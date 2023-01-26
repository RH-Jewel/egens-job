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
let saveJobIdArray = [];
jQuery('body').on('click','.save__jobs',function(){
    jQuery(this).toggleClass('is-saved');
    var job_id = jQuery(this).attr('data-save-job-id');
    if( !saveJobIdArray.includes(job_id) ){
        saveJobIdArray.push(job_id);
    }else{
        var filterJobId = saveJobIdArray.filter(item => item !== job_id);
        saveJobIdArray = filterJobId;
    }
    var data = {
        'action'		    : 'save_jobs',
        'job_id_array' 	    : saveJobIdArray,
    };
    var job_count = saveJobIdArray.length
    jQuery('.circle-indicator-count').text(job_count);
    sessionStorage.setItem("modalLikeContentCount", job_count);
    jQuery.ajax({ // you can also use $.post here
        url : egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
        data : data,
        type : 'POST',
        beforeSend : function(){
            jQuery('.modalLike .circle-loader').css('display','block');
            jQuery('.modalLike .panel-column-content.is-visible').css('opacity','0.4');
        },
        success : function( data ){
            jQuery('#modalLikeContent').empty().html( data );
            sessionStorage.setItem("modalLikeContent", data);
            jQuery('.modalLike .circle-loader').css('display','none');
            jQuery('.modalLike .panel-column-content.is-visible').css('opacity','1');
        }
    });
});

// Remove Save Jobs
jQuery('body').on('click','.js-remove-job',function(){
    var job_id = jQuery(this).attr('data-save-job-id');
    jQuery('.save__jobs').attr('data-save-job-id');
    jQuery(".save__jobs[data-save-job-id='" + job_id +"']").removeClass('is-saved');
    if( !saveJobIdArray.includes(job_id) ){
        saveJobIdArray.push(job_id);
    }else{
        var filterJobId = saveJobIdArray.filter(item => item !== job_id);
        saveJobIdArray = filterJobId;
    }
    var data = {
        'action'		    : 'save_jobs',
        'job_id_array' 	    : saveJobIdArray,
    };
    var job_count = saveJobIdArray.length
    jQuery('.circle-indicator-count').text(job_count);
    sessionStorage.setItem("modalLikeContentCount", job_count);
    jQuery.ajax({ // you can also use $.post here
        url : egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
        data : data,
        type : 'POST',
        beforeSend : function(){
            jQuery('.modalLike .circle-loader').css('display','block');
            jQuery('.modalLike .panel-column-content.is-visible').css('opacity','0.4');
        },
        success : function( data ){
            jQuery('#modalLikeContent').empty().html( data );
            sessionStorage.setItem("modalLikeContent", data);
            jQuery('.modalLike .circle-loader').css('display','none');
            jQuery('.modalLike .panel-column-content.is-visible').css('opacity','1');

        }
    });
});

var modalLikeContent = sessionStorage.getItem("modalLikeContent");
var modalLikeContentCount = sessionStorage.getItem("modalLikeContentCount");

if( modalLikeContent ) {
    jQuery('#modalLikeContent').empty().html( modalLikeContent );
}
if( modalLikeContentCount ) {
    jQuery('.circle-indicator-count').text(modalLikeContentCount);
}

jQuery(window).on('load', function(){
    jQuery('.pagination > .job_paginate:first').addClass('current');
});
