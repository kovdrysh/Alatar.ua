/**
 * Created by gena on 02.01.2016.
 */
$(document).ready(function(jQuery){
    $("li:has(ul.dropdown)").addClass("dropdownLi");
    $("li.dropdownLi > a").click(function(eventObject){return false});
    $(function() {
        $("a").bind('click',function() {
            var _this = $(this);
            _this.toggleClass('selected', 5);
            _this.next().toggleClass('dropdown', 500);
            $("a").not(_this).each(function() {
                $(this).next().addClass('dropdown', 500);
                $(this).removeClass('selected', 5);
            });
        });
    });
});
