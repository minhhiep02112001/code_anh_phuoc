/*!
 * Generated using the Bootstrap Customizer (https://getbootstrap.com/docs/3.4/customize/)
 */

/*!
 * Bootstrap v3.4.1 (https://getbootstrap.com/)
 * Copyright 2011-2019 Twitter, Inc.
 * Licensed under the MIT license
 */

if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(t){"use strict";var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1==e[0]&&9==e[1]&&e[2]<1||e[0]>3)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 4")}(jQuery),+function(t){"use strict";function e(e,o){return this.each(function(){var s=t(this),n=s.data("bs.modal"),a=t.extend({},i.DEFAULTS,s.data(),"object"==typeof e&&e);n||s.data("bs.modal",n=new i(this,a)),"string"==typeof e?n[e](o):a.show&&n.show(o)})}var i=function(e,i){this.options=i,this.$body=t(document.body),this.$element=t(e),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.fixedContent=".navbar-fixed-top, .navbar-fixed-bottom",this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,t.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};i.VERSION="3.4.1",i.TRANSITION_DURATION=300,i.BACKDROP_TRANSITION_DURATION=150,i.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},i.prototype.toggle=function(t){return this.isShown?this.hide():this.show(t)},i.prototype.show=function(e){var o=this,s=t.Event("show.bs.modal",{relatedTarget:e});this.$element.trigger(s),this.isShown||s.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',t.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){o.$element.one("mouseup.dismiss.bs.modal",function(e){t(e.target).is(o.$element)&&(o.ignoreBackdropClick=!0)})}),this.backdrop(function(){var s=t.support.transition&&o.$element.hasClass("fade");o.$element.parent().length||o.$element.appendTo(o.$body),o.$element.show().scrollTop(0),o.adjustDialog(),s&&o.$element[0].offsetWidth,o.$element.addClass("in"),o.enforceFocus();var n=t.Event("shown.bs.modal",{relatedTarget:e});s?o.$dialog.one("bsTransitionEnd",function(){o.$element.trigger("focus").trigger(n)}).emulateTransitionEnd(i.TRANSITION_DURATION):o.$element.trigger("focus").trigger(n)}))},i.prototype.hide=function(e){e&&e.preventDefault(),e=t.Event("hide.bs.modal"),this.$element.trigger(e),this.isShown&&!e.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),t(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),t.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",t.proxy(this.hideModal,this)).emulateTransitionEnd(i.TRANSITION_DURATION):this.hideModal())},i.prototype.enforceFocus=function(){t(document).off("focusin.bs.modal").on("focusin.bs.modal",t.proxy(function(t){document===t.target||this.$element[0]===t.target||this.$element.has(t.target).length||this.$element.trigger("focus")},this))},i.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",t.proxy(function(t){27==t.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},i.prototype.resize=function(){this.isShown?t(window).on("resize.bs.modal",t.proxy(this.handleUpdate,this)):t(window).off("resize.bs.modal")},i.prototype.hideModal=function(){var t=this;this.$element.hide(),this.backdrop(function(){t.$body.removeClass("modal-open"),t.resetAdjustments(),t.resetScrollbar(),t.$element.trigger("hidden.bs.modal")})},i.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},i.prototype.backdrop=function(e){var o=this,s=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var n=t.support.transition&&s;if(this.$backdrop=t(document.createElement("div")).addClass("modal-backdrop "+s).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",t.proxy(function(t){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(t.target===t.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),n&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!e)return;n?this.$backdrop.one("bsTransitionEnd",e).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION):e()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var a=function(){o.removeBackdrop(),e&&e()};t.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",a).emulateTransitionEnd(i.BACKDROP_TRANSITION_DURATION):a()}else e&&e()},i.prototype.handleUpdate=function(){this.adjustDialog()},i.prototype.adjustDialog=function(){var t=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&t?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!t?this.scrollbarWidth:""})},i.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},i.prototype.checkScrollbar=function(){var t=window.innerWidth;if(!t){var e=document.documentElement.getBoundingClientRect();t=e.right-Math.abs(e.left)}this.bodyIsOverflowing=document.body.clientWidth<t,this.scrollbarWidth=this.measureScrollbar()},i.prototype.setScrollbar=function(){var e=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"";var i=this.scrollbarWidth;this.bodyIsOverflowing&&(this.$body.css("padding-right",e+i),t(this.fixedContent).each(function(e,o){var s=o.style.paddingRight,n=t(o).css("padding-right");t(o).data("padding-right",s).css("padding-right",parseFloat(n)+i+"px")}))},i.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad),t(this.fixedContent).each(function(e,i){var o=t(i).data("padding-right");t(i).removeData("padding-right"),i.style.paddingRight=o?o:""})},i.prototype.measureScrollbar=function(){var t=document.createElement("div");t.className="modal-scrollbar-measure",this.$body.append(t);var e=t.offsetWidth-t.clientWidth;return this.$body[0].removeChild(t),e};var o=t.fn.modal;t.fn.modal=e,t.fn.modal.Constructor=i,t.fn.modal.noConflict=function(){return t.fn.modal=o,this},t(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(i){var o=t(this),s=o.attr("href"),n=o.attr("data-target")||s&&s.replace(/.*(?=#[^\s]+$)/,""),a=t(document).find(n),r=a.data("bs.modal")?"toggle":t.extend({remote:!/#/.test(s)&&s},a.data(),o.data());o.is("a")&&i.preventDefault(),a.one("show.bs.modal",function(t){t.isDefaultPrevented()||a.one("hidden.bs.modal",function(){o.is(":visible")&&o.trigger("focus")})}),e.call(a,r,this)})}(jQuery);;
var totalSteps = '';
var currentStep = 1;
console.log('test');
(function ($, Drupal, window, document, undefined) {

  Drupal.behaviors.park_suggestions_behaviors = {
    attach: function (context, settings) {

      jQuery(document).ready(function () {

        if(jQuery('body.section-get-inspired.find-your-park-quiz').length){

        // add status bar
        if (!jQuery('#quiz-status').length > 0) {
          var quizSteps = jQuery('#park-suggestion .quiz-step');
          totalSteps = quizSteps.length;
          jQuery('#park-suggestion').prepend('<div id="quiz-status" class="step1"><span class="status"><span class="current-step">' + currentStep + '</span> of <span class="total-steps">' + totalSteps + '</span></span></div>');

          // set active quiz item
          quizSteps.first().addClass('active');
          jQuery('#loading-graphic').addClass('disabled');
          if (jQuery('.field-subtitle').text() != 'Parks That Fit You.') {
            jQuery('.field-subtitle').text('Introduction');
          }
        }

        // question validation
        jQuery('.quiz-step.question input:not([type=text])').on('change', function () {
          var question = jQuery(this).closest('.quiz-step.question');
          if (question.find(':checked').length) {
            question.find('.next-btn').addClass('btn-enabled').removeClass('btn-disabled').removeClass('show-required-text');
          }
          else {
            question.find('.next-btn').removeClass('btn-enabled').addClass('btn-disabled');
          }
        });

        // quiz navigation
        jQuery('.next-btn:not(#submit-park-suggestion)').on('click', function (e) {
          e.preventDefault();
          if (jQuery(this).hasClass('btn-enabled')) {
            jQuery(this).removeClass('show-required-text');
            goForward();
          }
          else {
            jQuery(this).addClass('show-required-text');
          }
        });
        jQuery('.prev-btn').on('click', function (e) {
          e.preventDefault();
          goBack();
        });

        jQuery('#zipCode').keypress(function (e) {
          if (e.keyCode == 13) {
            e.preventDefault();
          }
        });

        // form submit button
        jQuery('#submit-park-suggestion').on('click', function (e) {
          e.preventDefault();
          if (jQuery(this).hasClass('btn-enabled')) {
            jQuery(this).removeClass('show-required-text');
            getParkSuggestion();
            jQuery('#park-suggestion .active').removeClass('active');
            jQuery('.field-subtitle').text('Parks That Fit You.');
            jQuery('#park-load').html('<p class="loading-graphic"><img src="/sites/all/modules/custom/fyp_parks_quiz/assets/FYP_Quiz_Loading.gif" alt="loading" width="125" height="125" /></p>');
            window.scroll({top: 0, left: 0});
          }
          else {
            jQuery(this).addClass('show-required-text');
          }
        });

        // social sharing
          jQuery('.sidebar-social-share a.share').click(function(e){
            e.preventDefault();
            let sharelink = jQuery(this);
            let sharehref = sharelink.attr('href');
            let sharenetwork = sharelink.attr('data-network');

            const sharescreenwidth = window.innerWidth;
            const sharescreenheight = window.innerHeight;

            let sharemodalwidth = 600;
            let sharemodalheight = 300;

            if (sharescreenwidth < sharemodalwidth){
              sharemodalwidth = sharescreenwidth - 40;
            }

            if (sharescreenheight < sharemodalheight){
              sharemodalheight = sharescreenheight - 40;
            }


            let sharepopup = function(sharenetwork){
              let shareoptions = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
              window.open(sharehref, '', shareoptions+'height='+sharemodalheight+',width='+sharemodalwidth);
            }

            sharepopup(sharenetwork);
          });
      }
      });

    }
  };

})(jQuery, Drupal, this, this.document);

function goForward(){
  jQuery('.quiz-step-'+currentStep).addClass('hide');
  currentStep++;
  jQuery('#quiz-status').attr('class','step'+currentStep);
  jQuery('#quiz-status .current-step').text(currentStep);
  jQuery('.quiz-step-'+currentStep).addClass('active');
  jQuery('.active.hide').removeClass('active').removeClass('hide');
  jQuery('.field-subtitle').text(jQuery('.quiz-step-'+currentStep).attr('data-subtitle'));
  window.scroll({ top: 0, left: 0 });
}

function goBack(){
  jQuery('.quiz-step-'+currentStep).addClass('hide');
  currentStep--;
  jQuery('#quiz-status').attr('class','step'+currentStep);
  jQuery('#quiz-status .current-step').text(currentStep);
  jQuery('.quiz-step-'+currentStep).addClass('active');
  jQuery('.active.hide').removeClass('active').removeClass('hide');
  jQuery('.field-subtitle').text(jQuery('.quiz-step-'+currentStep).attr('data-subtitle'));
  window.scroll({ top: 0, left: 0 });
}

var selectedInputIDs = '';
var selectedAPIpreferences = '';
var selectedActivityTermIDs = [];
var selectedExperienceTermIDs = [];


function getParkSuggestion() {
  // Set up our HTTP request
  var xhr = new XMLHttpRequest();
  var formItemsWithValuesCount = 0;
  var formItemsSelectedCount = 0;
  selectedInputIDs = '';
  selectedAPIpreferences = '';
  selectedActivityTermIDs = [];
  selectedExperienceTermIDs = [];
  // create the string of preferences that will be passed into the API as well as the arrays of preference term IDs
  jQuery('#park-suggestion input:checked').each(function () {
    if (jQuery(this).attr('data-activity-id')) {
      var activities = jQuery(this).attr('data-activity-id');
      var activitiesArr = activities.split(',');
      var activitiesLength = activitiesArr.length;
      for (var i = 0; i < activitiesLength; i++) {
        selectedActivityTermIDs.push(activitiesArr[i]);
      }
    }
    if (jQuery(this).attr('data-experience-id')) {
      var experiences = jQuery(this).attr('data-experience-id');
      var experiencesArr = experiences.split(',');
      var experiencesLength = experiencesArr.length;
      for (var i = 0; i < experiencesLength; i++) {
        selectedExperienceTermIDs.push(experiencesArr[i]);
      }
    }
    if (this.value) {
      if (formItemsWithValuesCount == 0) {
        selectedAPIpreferences += '?';
      } else {
        selectedAPIpreferences += '&';
      }
      selectedAPIpreferences += 'p=' + this.value;
      formItemsWithValuesCount++;
    }
    if (this.id) {
      if (!formItemsSelectedCount == 0) {
        selectedInputIDs += ',';
      }
      selectedInputIDs += this.id;
      formItemsSelectedCount++;
    }

  });
  // Create the GET request to the API data store
  xhr.open('GET', 'https://fyp-quiz-heroku-22.herokuapp.com/api/v1/resources/park-recs' + selectedAPIpreferences);
  // Setup our listener to process completed requests
  xhr.onload = function () {
    // Filter successful status levels
    if (xhr.status >= 200 && xhr.status < 400) {
      // Convert response string into JSON

      var apiResponse = JSON.parse(xhr.responseText);

      // save data to drupal and return code
      var apiResponseParkIDs = apiResponse.join("+");
      selectedExperienceTermIDs = shuffle(selectedExperienceTermIDs);
      var experienceTermIDs = selectedExperienceTermIDs.join("+");
      var activityTermIDs = shuffle(selectedActivityTermIDs);
      var zipCode = jQuery('#zipCode').val();
      quizCode = drupalStoreData(apiResponseParkIDs, activityTermIDs, experienceTermIDs, zipCode);

      console.log('apiResponseParkIDs getting passed to drupalStoreData() = ' + apiResponseParkIDs);
      console.log('activityTermIDs getting passed to drupalStoreData() = ' + activityTermIDs);
      console.log('experienceTermIDs getting passed to drupalStoreData() = ' + experienceTermIDs);
      console.log('zipCode getting passed to drupalStoreData() = ' + zipCode);

   }
    else {
      // unsuccessful status level
      jQuery('#results').text('No recommendation was found');
    }
  };
  // add a level of error protection
  xhr.onerror = function () {
    jQuery('#results').text('No recommendation was found');
  }
  // Send the request
  xhr.send();
}

// helper function to randomize array items
var shuffle = function (array) {
  // remove any duplicate items from array
  const IDs = array;
  let uniqueArray = array;

  var currentIndex = uniqueArray.length;
  var temporaryValue, randomIndex;
  // While there remain elements to shuffle...
  while (0 !== currentIndex) {
    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    // And swap it with the current element.
    temporaryValue = uniqueArray[currentIndex];
    uniqueArray[currentIndex] = uniqueArray[randomIndex];
    uniqueArray[randomIndex] = temporaryValue;
  }
  return uniqueArray;
};

function renderParkSuggestion(apiResponse, selectedExperienceTermIDs, selectedActivityTermIDs, selectedInputIDs, zip_code) {
  var apiResponseParkIDs = experienceTermIDs = activityTermIDs = '';
  if (apiResponse !== undefined) {
    //apiResponseParkIDs = apiResponse.join("+");
    var parkOrder = apiResponse.split(',');
    // replace commas with plus signs and assign to apiResponseParkIDs
    apiResponseParkIDs = apiResponse.replace(new RegExp(',', 'g'), '+');
    // load the main view of suggested parks
    console.log('from inside renderParkSuggestion apiResponse = ' + apiResponse);
    console.log('from inside renderParkSuggestion selectedExperienceTermIDs = ' + selectedExperienceTermIDs);
    console.log('from inside renderParkSuggestion selectedActivityTermIDs = ' + selectedActivityTermIDs);
    console.log('from inside renderParkSuggestion selectedInputIDs = ' + selectedInputIDs);
    console.log('from inside renderParkSuggestion zip_code = ' + zip_code);
    console.log('from inside renderParkSuggestion parkOrder = ' + parkOrder);
    console.log('from inside renderParkSuggestion apiResponseParkIDs = ' + apiResponseParkIDs);


    jQuery('#park-load').load('/park-suggestions?nid=' + apiResponseParkIDs + ' #content', function (response, status, xhr) {
      if (status == "error") {
        jQuery('#park-load').html('page did not load');
      } else {
        parkOrder.forEach(function(parkID){
          jQuery('.view-id-park_suggestions.view-display-id-page > .view-content .parkID-'+parkID).closest('.views-row').appendTo('.view-id-park_suggestions.view-display-id-page > .view-content');
        });

        // inject newsletter signup
        if (!jQuery('.newsletter-signup').length) {
          jQuery('.view--park-suggestions .views-row:nth-child(6)').after('<div class="newsletter-signup"><div class="text"><h2>Sign up. Stay Connected.</h2><p>Signup for our newsletter to stay connected to national park news, as well as the latest info on promotions, new merchandise, and more.</p></div><div class="action cta"><div class="field__link-ext"><a href="/get-involved/sign-newsletter">SIGN UP</a></div></div></div>');
        }

        // park link modals
        jQuery('.modal-content-view .views-row a').unbind();
        jQuery('.modal-content-view .views-row a').on('click',function(e){
          e.preventDefault();
          thisHREF = jQuery(this).attr('href');
          loadModal(thisHREF);
        });
        jQuery('#park-load .view-more a').on('click',function(e){
          e.preventDefault();
          if (jQuery('#park-load').hasClass('expand-1')){
            jQuery(this).remove();
            jQuery('#park-load').addClass('expand-2');
          } else {
            jQuery('#park-load').addClass('expand-1');
          }
        });
      }
    });
    // clear any existing views that have been loaded during previous submissions
    jQuery('#park-term-1, #park-term-2, #park-related-1, #park-related-2, #park-related-1-more, #park-related-2-more').html('');
    // randomize array of selected option term ids
    activityTermIDs = selectedActivityTermIDs;
    if (activityTermIDs.length > 0) {
      // load the related views - loadHTML(name, path to view, element to contain html, node id, more link)
      loadHTML('Description of related term 1', '/park-suggestion-term-1?tid', '#park-term-1', activityTermIDs[0]);
      loadHTML('View of parks related to term 1', '/park-suggestions-related?tid', '#park-related-1', activityTermIDs[0], 'more-1');
    }
    if (activityTermIDs.length > 1) {
      // flag if a term that could have a duplicate was used in the first view
      if (activityTermIDs[0] == 56 || activityTermIDs[0] == 5 || activityTermIDs[0] == 68){
        if (activityTermIDs[1] == 56 || activityTermIDs[1] == 5 || activityTermIDs[1] == 68){
          // do not render a second view if there is a duplicate
        } else {
          loadHTML('Description of related term 2', '/park-suggestion-term-2?tid', '#park-term-2', activityTermIDs[1]);
          loadHTML('View of parks related to term 2', '/park-suggestions-related-2?tid', '#park-related-2', activityTermIDs[1], 'more-2');
        }
      } else {
        loadHTML('Description of related term 2', '/park-suggestion-term-2?tid', '#park-term-2', activityTermIDs[1]);
        loadHTML('View of parks related to term 2', '/park-suggestions-related-2?tid', '#park-related-2', activityTermIDs[1], 'more-2');
      }
    }
    // load experience view
    if (selectedExperienceTermIDs.length > 0){
      // randomize array of unique selected option term ids
      selectedExperienceTermIDs = shuffle(selectedExperienceTermIDs);
      experienceTermIDs = selectedExperienceTermIDs.join("+");
      loadHTML('Related Experiences and Stories', '/park-suggestions-experiences?tid', '#park-experiences', experienceTermIDs);
    } else {
      loadHTML('Related Experiences and Stories', '/park-suggestions-experiences', '#park-experiences');
    }
    // email submission form trigger
    jQuery('#block-bean-email-your-quiz-results-cta button.quiz-button').on('click',function(e){
      e.preventDefault();
      jQuery('.validation-error').removeClass('validation-error');
      jQuery('#form-validation-responses').html('');
      var responseText = '';
      var formFirstName = jQuery('#en__field_supporter_firstName').val();
      if (formFirstName == ''){jQuery('#en__field_supporter_firstName').addClass('validation-error');}
      var formLastName = jQuery('#en__field_supporter_lastName').val();
      if (formLastName == ''){jQuery('#en__field_supporter_lastName').addClass('validation-error');}
      var formZip = jQuery('#en__field_supporter_postcode').val();
      if (formZip == ''){jQuery('#en__field_supporter_postcode').addClass('validation-error');}
      var formEmail = jQuery('#en__field_supporter_emailAddress').val();
      if (formEmail == ''){jQuery('#en__field_supporter_emailAddress').addClass('validation-error');}
      var termAgreement = jQuery('#term-agreement');
      if (!termAgreement.is(':checked')){termAgreement.addClass('validation-error');}
      var pathArray = window.location.pathname.split('/');
      var urlHash = pathArray[4];

      if (jQuery('form .validation-error').length) {
        jQuery('body').addClass('validation-error');
        jQuery('#form-validation-responses').append('<p><br>All fields are required.</p>');
      } else {
        drupalStoreEmail(formFirstName, formLastName, formZip, formEmail, urlHash);
        jQuery('#quiz-email-results-form').html('<p class="loading-graphic"><img src="/sites/all/modules/custom/fyp_parks_quiz/assets/FYP_Quiz_Loading.gif" alt="loading" width="125" height="125" /></p>');
      }
    });

    madLibs(selectedInputIDs);

    if (zip_code){
      loadHTML('Parks by Proximity', '/your-parks-proximity?field_geofield_latlon='+zip_code, '#park-proximity', '', '' ,'.view--your-parks.view--display-id-page_6');
    }

  }
  else {
    jQuery('#results').text('No recommendation was found');
    jQuery('#park-load').html('');
  }
}

function madLibs(selectedInputIDs) {

  var madLib = 'Here are your quiz results, you beautiful ';

  if (selectedInputIDs.indexOf('preference_6-a') !== -1){madLib += 'eagle';}
  if (selectedInputIDs.indexOf('preference_6-b') !== -1){madLib += 'mountain lion';}
  if (selectedInputIDs.indexOf('preference_6-c') !== -1){madLib += 'lizard';}
  if (selectedInputIDs.indexOf('preference_6-d') !== -1){madLib += 'salmon';}
  if (selectedInputIDs.indexOf('preference_6-e') !== -1){madLib += 'elk';}
  if (selectedInputIDs.indexOf('preference_6-f') !== -1){madLib += 'horse';}
  if (selectedInputIDs.indexOf('preference_6-g') !== -1){madLib += 'chipmunk';}
  if (selectedInputIDs.indexOf('preference_6-i') !== -1){madLib += 'butterfly';}
  if (selectedInputIDs.indexOf('preference_6-k') !== -1){madLib += 'gray wolf';}

  madLib += '! Looks like you\'re traveling ';

  if (selectedInputIDs.indexOf('preference_1-a') !== -1){madLib += 'with your pals';}
  if (selectedInputIDs.indexOf('preference_1-b') !== -1){madLib += 'with your family';}
  if (selectedInputIDs.indexOf('preference_1-c') !== -1){madLib += 'alone';}

  madLib += ' this ';

  if (selectedInputIDs.indexOf('preference_8-a') !== -1){madLib += 'winter';}
  if (selectedInputIDs.indexOf('preference_8-b') !== -1){madLib += 'spring';}
  if (selectedInputIDs.indexOf('preference_8-c') !== -1){madLib += 'fall';}
  if (selectedInputIDs.indexOf('preference_8-d') !== -1){madLib += 'summer';}

  madLib += '. We\'ve tried to find parks that align with your preferences so you can explore many amazing sites across the country.';

  jQuery('#results').html('<p class="quiz-results-are-in">'+madLib+'</p>');

}


function addModalParkShare() {
  if (jQuery('.park-share').length > 0) {
    var facebookshare = jQuery('.park-share-facebook');
    var twittershare = jQuery('.park-share-twitter');
    var url = jQuery(location).attr('href');

    twittershare.each(function() {
      var parentpark = jQuery(this).closest('.node--park').find('.field__title h2').text();
      var parentparkurl = jQuery(this).closest('.node--park').attr('about');
      jQuery(this).append( '<a class="park-share_link park-share-twitter_link" rel="https://findyourpark.org" href="http://twitter.com/intent/tweet?text=' + 'My park is ' + parentpark + '!' + '&hashtags=FindYourPark&via=NationalParkFdn&url=https%3A%2F%2Ffindyourpark.com' + parentparkurl + '">Found My Park</a>');
    });

    facebookshare.each(function() {
      var parentpark = jQuery(this).closest('.node--park').find('.field__title h2').text();
      var parentparkStr = 'My park is ' + parentpark + '! ' + '#FindYourPark';
      var encodedParentPark = encodeURIComponent(parentparkStr);
      jQuery(this).append( '<a class="park-share_link park-share-facebook_link" rel="https://findyourpark.org" href="https://www.facebook.com/dialog/share?app_id=1013158759130574&display=popup&href=https%3A%2F%2Ffindyourpark.com%2Fpark-finder&redirect_uri=https%3A%2F%2Ffindyourpark.com%2Fpark-finder&quote=' + encodedParentPark + '">Share on Facebook</a>');
    });
  }
  if (jQuery('.node--park').length > 0) {
    //append link to google to the state labels
    jQuery('.field__state').each(function () {
      if(jQuery(this).siblings('.field__location').length > 0) {
        var latlong = jQuery(this).siblings('.field__location').find('a').attr('href') ;
        //console.log(latlong);
        var title = encodeURIComponent( jQuery(this).siblings('.field__title').text().replace(/"/g, '\'') );
        var link = '&nbsp;&nbsp;|&nbsp;&nbsp;<a class="group-link field-group-link ext" href="' + latlong + '" target="_blank">' + 'Google Map<span class="element-invisible">of ' + jQuery(this).siblings('.field__title').text() + '</span><span class="ext" aria-label="(link is external)"></span></a>';

        jQuery(this).append(link);
        jQuery(this).siblings('.field__location').addClass('element-invisible');
      }
    });
  }
}

function loadModal(url, modalHTML) {
  if(modalHTML){
    jQuery('#parkModal .modal-body').html(modalHTML);
    jQuery('#parkModal').modal();
    jQuery('#parkModal').addClass('survey');
    addModalParkShare();
  } else {
    jQuery('#parkModal .modal-body').load(url + ' .node.node--park', function (response, status, xhr) {
      if (status == 'success'){
        jQuery('#parkModal').removeClass('survey');
        jQuery('#parkModal').modal();
        addModalParkShare();
      }
    });
  }
}

function loadHTML(name, path, el, taxTermID, moreLink, targetItem) {
  if (taxTermID){
    jQuery(el).load(path + '=' + taxTermID + ' .column.main-content', function (response, status, xhr) {
      if (status == 'success'){
        if (moreLink){

          if (taxTermID){

            switch(taxTermID){
              case '45': // childrens programs + historical + tours
                taxTermID = '45&field_activities%5B1%5D=53&field_activities%5B2%5D=64';
                break;
              case '56': // kayaking + wildlife viewing + stargazing
                taxTermID = '56&field_activities%5B1%5D=68&field_activities%5B2%5D=67&field_activities%5B3%5D=62';
                break;
              case '5': // skiing + wildlife viewing + stargazing
                taxTermID = '5&field_activities%5B1%5D=68&field_activities%5B2%5D=67&field_activities%5B3%5D=62';
                break;
              case '68': // winter sports + wildlife viewing + stargazing
                taxTermID = '68&field_activities%5B1%5D=67&field_activities%5B2%5D=62';
                break;
              case '65': // water activities + kayaking
                taxTermID = '65&field_activities%5B1%5D=56';
                break;
              case '53': // historical + tours + childrens programs
                taxTermID = '53&field_activities%5B1%5D=64&field_activities%5B2%5D=45';
                break;
              case '64': // tours + arts & culture
                taxTermID = '64&field_activities%5B1%5D=38';
                break;
            }


          }
          if (moreLink == 'more-1'){

            jQuery('#park-related-1-more').append('<div class="view-more more-link"><a href="/park-finder?&field_activities%5B0%5D='+taxTermID+'">More Parks Like These</a></div>');
            setTimeout(function () {
              jQuery('#park-suggestion ~ div .column.main-content').each(function(){
                jQuery(this).removeAttr('id');
              });
            }, 1500);
          } else if (moreLink == 'more-2') {
            jQuery('#park-related-2-more').append('<div class="view-more more-link"><a href="/park-finder?&field_activities%5B0%5D='+taxTermID+'">More Parks Like These</a></div>');
          }
        }
        // park link modals
        jQuery('.modal-content-view .views-row a').unbind();
        jQuery('.modal-content-view .views-row a').on('click',function(e){
          if (!jQuery(this).hasClass('modal-processed')) {
            e.preventDefault();
            thisHREF = jQuery(this).attr('href');
            loadModal(thisHREF);
          } else {
            jQuery(this).addClass('modal-processed');
          }
        });
      }
    });
  } else if (targetItem) {
    jQuery(el).load(path + ' '+targetItem, function (response, status, xhr) {
      if (status == 'success'){
        // park link modals
        jQuery('.modal-content-view .views-row a').unbind();
        jQuery('.modal-content-view .views-row a').on('click',function(e){
          if (!jQuery(this).hasClass('modal-processed')) {
            e.preventDefault();
            thisHREF = jQuery(this).attr('href');
            loadModal(thisHREF);
          } else {
            jQuery(this).addClass('modal-processed');
          }
        });
      }
    });
  } else {
    jQuery(el).load(path + ' .column.main-content', function (response, status, xhr) {
    });
  }
}

function drupalStoreData(apiResponseParkIDs, activityTermIDs, experienceTermIDs, zip_code) {

  var xhr = new XMLHttpRequest();

  var exp = experienceTermIDs.replace(/\+/g,',');
  var api = apiResponseParkIDs.replace(/\+/g,',');
  var apiPrefs = selectedAPIpreferences.replace(/\&p\=/g,',');
  var quizCode = Math.random().toString(36).substring(2, 8) + Math.random().toString(36).substring(2, 8);
  apiPrefs = apiPrefs.replace(/\?p\=/g,'');

  var queryString = 'selectedInputIDs=' + selectedInputIDs
    + '&selectedAPIpreferences=' + apiPrefs
    + '&apiResponseParkIDs=' + api
    + '&activityTermIDs=' + activityTermIDs
    + '&quizCode=' + quizCode
    + '&experienceTermIDs=' + exp;

  if (zip_code){
    queryString += '&zip_code=' + zip_code;
  }
  console.log('queryString used in drupalStoreData() which is appended to /quiz/post-data?  xhr get url = ' + queryString);

  xhr.onload = function () {
    // Filter successful status levels
    if (xhr.status >= 200 && xhr.status < 400) {
      // redirect to /quiz/results/#quizcode for the render function
      window.location.href = '/get-inspired/find-your-park-quiz/quiz-results/'+quizCode;
    }
  };


  // Create the GET request to the data storage hook
  xhr.open('GET', '/quiz/post-data?' + queryString );

  // Send the request
  xhr.send();

}

function drupalStoreScore(feedback, quizCode) {

  var xhr = new XMLHttpRequest();
  var queryString = 'feedback='+feedback
    + '&code=' + quizCode;
  xhr.open('GET', '/quiz/post-score?' + queryString );
  xhr.send();
}

function drupalStoreEmail(firstName, lastName, zip, email, quizCode) {

  var xhr = new XMLHttpRequest();
  var queryString = 'first=' + firstName
    + '&last=' + lastName
    + '&zip=' + zip
    + '&email=' + email
    + '&code=' + quizCode;

  // Create the GET request to the data storage hook
  xhr.open('GET', '/quiz/post-email?' + queryString );

  // Setup our listener to process completed requests
  xhr.onload = function () {
    // Filter successful status levels
    if (xhr.status >= 200 && xhr.status < 400) {
      // success
      jQuery('#quiz-email-results-form').html('<p>Right on! We\'ve received your request and will send you an email with your quiz results shortly.</p><p>Not seeing our email in your inbox? It might have been filtered as spam or junk mail. Be sure to check these folders for your Find Your Park Quiz results!</p>');
    }
    else {
      // unsuccessful status level
      jQuery('#quiz-email-results-form').html('<p>Thank you.</p>');
    }
  };
  // Send the request
  xhr.send();
}
;
