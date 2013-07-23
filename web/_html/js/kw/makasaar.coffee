extendAboutBlock = ->
  $("#aboutus").addClass('extended')

collapseAboutBlock = ->
  $("#aboutus").removeClass('extended')

deselectTemiList = ->
  items = $('.b-temi-list').children('.item').toArray()
  $(item).removeClass('active') for item in items

showTeam = ->
  $('#mission-block').addClass('hidden')
  $('#team-block').removeClass('hidden')
  $('#about-team-switch').addClass('active')
  extendAboutBlock()

showMission = ->
  $('#team-block').addClass('hidden')
  $('#mission-block').removeClass('hidden')
  $('#about-mission-switch').addClass('active')
  extendAboutBlock()


$(document).on 'click', '#about-team-switch', ->
  if $(this).hasClass('active')
    deselectTemiList()
    collapseAboutBlock()
  else
    if $('#about-mission-switch').hasClass('active')
      collapseAboutBlock()
      deselectTemiList()
      $('#about-team-switch').addClass('active')
      setTimeout ( -> showTeam() ), 650
    else
      showTeam()

$(document).on 'click', '#about-mission-switch', ->
  if $(this).hasClass('active')
    deselectTemiList()
    collapseAboutBlock()
  else
    if $('#about-team-switch').hasClass('active')
      collapseAboutBlock()
      deselectTemiList()
      $('#about-mission-switch').addClass('active')
      setTimeout ( -> showMission() ), 650
    else
      showMission()

showMasterclass = ->
  $('#services').addClass('extended');
  $('#masterclass-switch').addClass('active');

hideMasterclass = ->
  $('#services').removeClass('extended');
  $('#masterclass-switch').removeClass('active');

$(document).on 'click', '#masterclass-switch', ->
  if $(this).hasClass('active')
    hideMasterclass();
  else
    showMasterclass();

$(document).on 'click', '.b-masterclass-menu .item', ->
  unless $(this).hasClass('active')
    current_menu = $(".b-masterclass-menu .item.active")
    $(current_menu).removeClass('active')
    current_id = $(current_menu).data('content')
    new_id = $(this).data('content')
    $(this).addClass('active')
    $(current_id).removeClass('active')
    $(new_id).addClass('active')



