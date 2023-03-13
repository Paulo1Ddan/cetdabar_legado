//Navbar

$(document).ready(function() {
    $('.openMenu').click(function(){
        $('.menuMobile').toggleClass('ativo')
    })
    $('.closeMenu').click(function(){
        $('.menuMobile').toggleClass('ativo')
        console.log('foi')
    })
})

$(document).ready(function(){
    $('#dropdownMobile').click(function(){
        $('#iconDropMobile').toggleClass('rotate');
        $('.menuDropdownMobile').slideToggle()
    })
})