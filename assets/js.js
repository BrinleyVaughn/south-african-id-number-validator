jQuery(function($) {

    $('.validator-form').on('focus', 'input[type=number]', function (e) {
      $(this).on('wheel.disableScroll', function (e) {
        e.preventDefault()
      })
    })
    $('.validator-form').on('blur', 'input[type=number]', function (e) {
      $(this).off('wheel.disableScroll')
    })

})