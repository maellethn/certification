$( document ).ready(function() {
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    $('.questions #prevBtn').on('click', function () {
        currentTab -= 1
        showTab(currentTab);
    })
    $('.questions #nextBtn').on('click', function () {
        currentTab += 1
        showTab(currentTab);
    })
});

function showTab(n) {
    // This function will display the specified tab of the form ...
    var x = $('.questions .questions__random__form__tab');
    $(".questions .questions__random__form__tab:not([class*='d-none'])").addClass("d-none");
    $(x[n]).removeClass('d-none');
    // ... and fix the Previous/Next buttons:
    if (n === 0) {
        $(".questions #prevBtn").addClass('d-none');
    } else {
        $(".questions #prevBtn").removeClass('d-none');
    }
    if (n === (x.length - 1)) {
        $('.questions__random__form__btn_group').append("<button type=\"submit\" id=\"prevBtn\" class=\"btn btn-success \">Submit</button>")
    }
}