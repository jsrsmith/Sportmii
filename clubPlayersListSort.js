$(document).ready(function()
{
$('.registeredPlayers tr').sort(function(a, b) {
    if ($(a).find('td:eq(0)').text() > $(b).find('td:eq(0)').text())
        return 1;
    else if ($(a).find('td:eq(0)').text() < $(b).find('td:eq(0)').text())
        return -1;
    return 0;
}).appendTo('.registeredPlayers');
});
