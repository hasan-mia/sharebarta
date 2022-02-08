/* ============
 * Developer: Md Hasan Mia
 * Web: https://hasanmia.com
 * fb: https://fb.me/hasanmia69
 * Email: info@hasanmia.com
 * js version: 1.0
 */
 
 
 
// ===========
// Back To Top
//==============
$(document).ready(function() {
  var btn = $('#button');
  var offset = 300;
  var duration = 500;
  jQuery(window).scroll(function() {
    if ($(window).scrollTop() > 200) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });
$('.backtotop').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({
      scrollTop: 0
    }, duration);
    return false;
  })
  
});

// ============
// Facebook page close button
//==============

jQuery(document).ready(function( $ ){
    // =========Remove Button======
    $("button").click(function(){
    $(".remove").fadeOut('slow');
    });
});

// ============
// Bootstrap Carosel Auto Slide
//==============

// $('.carousel').carousel({
//   interval: 2000
// })

// ==========================
// Camera Gallery Slider
//===========================

// let modalId = $('#image-gallery');
// $(document)
//   .ready(function() {

//     loadGallery(true, 'a.thumbnail');

//     //This function disables buttons when needed
//     function disableButtons(counter_max, counter_current) {
//       $('#show-previous-image, #show-next-image')
//         .show();
//       if (counter_max === counter_current) {
//         $('#show-next-image')
//           .hide();
//       } else if (counter_current === 1) {
//         $('#show-previous-image')
//           .hide();
//       }
//     }

//     /**
//      *
//      * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
//      * @param setClickAttr  Sets the attribute for the click handler.
//      */

//     function loadGallery(setIDs, setClickAttr) {
//       let current_image,
//         selector,
//         counter = 0;

//       $('#show-next-image, #show-previous-image')
//         .click(function() {
//           if ($(this)
//             .attr('id') === 'show-previous-image') {
//             current_image--;
//           } else {
//             current_image++;
//           }

//           selector = $('[data-image-id="' + current_image + '"]');
//           updateGallery(selector);
//         });

//       function updateGallery(selector) {
//         let $sel = selector;
//         current_image = $sel.data('image-id');
//         $('#image-gallery-title')
//           .text($sel.data('title'));
//         $('#image-gallery-image')
//           .attr('src', $sel.data('image'));
//         disableButtons(counter, $sel.data('image-id'));
//       }

//       if (setIDs == true) {
//         $('[data-image-id]')
//           .each(function() {
//             counter++;
//             $(this)
//               .attr('data-image-id', counter);
//           });
//       }
//       $(setClickAttr)
//         .on('click', function() {
//           updateGallery($(this));
//         });
//     }
//   });

// // build key actions
// $(document)
//   .keydown(function(e) {
//     switch (e.which) {
//       case 37: // left
//         if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
//           $('#show-previous-image')
//             .click();
//         }
//         break;

//       case 39: // right
//         if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
//           $('#show-next-image')
//             .click();
//         }
//         break;

//       default:
//         return; // exit this handler for other keys
//     }
//     e.preventDefault(); // prevent the default action (scroll / move caret)
//   });
// ======end gallery=======

