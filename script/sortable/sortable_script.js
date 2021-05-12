$(function () {
    var parent = $(".sortable");
    parent.each((index, item)=>{
        var divs = $(item).children();
        console.log(divs);
        while (divs.length) {
            item.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
        }
    })

    $(".sortable").sortable({
        activate: function (event, ui) {
        }
    });


});