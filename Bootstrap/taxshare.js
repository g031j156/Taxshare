$(function(){
    $(".hoge").toggle(function(){
        $(".test").slideUp()
    },function(){
        $(".test").slideDown()
    });
});
