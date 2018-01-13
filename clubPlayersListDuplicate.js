$(document).ready(function()
{
var seen = {};
$('.registeredPlayers tr').each(function() {
    var txt = $(this).text();
    if (seen[txt])
        $(this).remove();
    else
        seen[txt] = true;
});
});