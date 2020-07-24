$(function() {

  $('.user-section').click(function() {
    $(this).toggleClass('show');
    $(this).next().toggleClass('show');
  })
  
  $('.div_tab_item').click(function() {
    $('.div_tab_item').removeClass('sel');
    $(this).addClass('sel');
    idx = $(this).attr('idx');
    $('form').hide();
    $('#form_' + idx).show();
  })

  $('#tab_1').click();

  initCalendar();
  loadDataWorkout();
  loadDataDiet();

  $('.timepicker').timepicker({
  	timeFormat: 'h:mm p',
  	interval: 60,
  	minTime: '7',
  	maxTime: '10:00pm',
  	defaultTime: '9',
  	startTime: '7:00',
  	dynamic: false,
  	dropdown: true,
  	scrollbar: true
  });

	$('.bt_close').click(function() {
		$('.div_dialog').hide();
	})

	$('#dlg_workout .bt_save').click(function() {
		time = $('#dlg_workout .timepicker').val();
		data = "";
		ids = "";

	  chosen = $("#workout_select").data('chosen');
    opts = getSelectedOptionsMe(chosen);
    ids = opts.join();
		$('#workout_select').next().find('li.search-choice').each(function() {
			data += `<div>` + $(this).find('span').text() + `</div>`;
		})
		if (data == "") {
			alert("You need to select at least one");
			return;
		}
		
    $('.bt_close').click();
		// ================= post data ====================
    $('#loading').show();
    var form_data = new FormData(); 
    form_data.append('user_id', $('#user_id').val());
    form_data.append('date', getDate());
    form_data.append('time', time);
    form_data.append('data', ids);
    form_data.append('id', $('#dlg_workout').attr('idd'));
    $.ajax({
        type: "post",
        url: '../json/save_user_workout.php',
        cache: false,
        processData: false, 
        contentType: false,
        data: form_data,
        success: function(res) { 
          $('#loading').hide();
        	updateWorkout(ids, time, data, res.id, $('#dlg_workout').attr('idd')==0 ? true : false);
        },
        error: function(err) {
          $('#loading').hide();
          	console.log(err);
        },
        dataType: 'json'
    })

	})

	$('#dlg_diet .bt_save').click(function() {
		time = $('#dlg_diet .timepicker').val();
		data = "";
		ids = "";

	  chosen = $("#diet_select").data('chosen');
    opts = getSelectedOptionsMe(chosen);
    ids = opts.join();
		$('#diet_select').next().find('li.search-choice').each(function() {
			data += `<div>` + $(this).find('span').text() + `</div>`;
		})
		if (data == "") {
			alert("You need to select at least one");
			return;
		}

    $('.bt_close').click();
    // ================= post data ====================
    $('#loading').show();
    var form_data = new FormData(); 
    form_data.append('user_id', $('#user_id').val());
    form_data.append('date', getDate());
    form_data.append('time', time);
    form_data.append('data', ids);
    form_data.append('id', $('#dlg_diet').attr('idd'));
    $.ajax({
        type: "post",
        url: '../json/save_user_diet.php',
        cache: false,
        processData: false, 
        contentType: false,
        data: form_data,
        success: function(res) { 
          $('#loading').hide();
          updateDiet(ids, time, data, res.id, $('#dlg_diet').attr('idd')==0 ? true : false);
        },
        error: function(err) {
          $('#loading').hide();
            console.log(err);
        },
        dataType: 'json'
    })
	})

  $('.prev').click(function() {
    var date = new Date(cur_date);
    var pastDate = date.getDate() - 7;
    cur_date.setDate(pastDate);
    initCalendar();
    loadDataWorkout();
    loadDataDiet();
  })
  $('.next').click(function() {
    var date = new Date(cur_date);
    var pastDate = date.getDate() + 7;
    cur_date.setDate(pastDate);
    initCalendar();
    loadDataWorkout();
    loadDataDiet();
  })
})

function updateWorkout(ids, time, data, id, append=true, sday=null) {
	// ================= close dialog ====================
	html = `<div class='wdata' ids='`+ids+`' idd='`+id+`' id='wdata_`+id+`'>
				<div class='wdelete'><i class='dripicons-trash'></i></div>
			<div class='wtime'>`+ time +`</div>
			<div class='wplan'>` + data + `</div>
	</div>`;
  if (append) {
	 $('.div_workout .data_' + (sday ? sday : sel_day)).append(html);
  } else {
    $('#wdata_'+id).attr('ids', ids);
    $('#wdata_'+id).html(`
      <div class='wdelete'><i class='dripicons-trash'></i></div>
      <div class='wtime'>`+ time +`</div>
      <div class='wplan'>` + data + `</div>
    `);
  }

	// ================= events ====================
	$('.div_workout .wdelete').unbind('click');
	$('.div_workout .wdelete').click(function(e) {
    e.preventDefault(false);
    var form_data = new FormData(); 
    form_data.append('id', $(this).parent().attr('idd'));
    $.ajax({
        type: "post",
        url: '../json/delete_user_workout.php',
        cache: false,
        processData: false, 
        contentType: false,
        data: form_data,
        success: function(res) { 
        },
        error: function(err) {
            console.log(err);
        },
        dataType: 'json'
    })
		$(this).parent().remove();
	})
	$('.div_workout .wdata').unbind('click');
	$('.div_workout .wdata').click(function() {
		sel_day = $(this).parent().attr('day');
		sel_year = $(this).parent().attr('year');
		sel_month = $(this).parent().attr('month');
		ids = $(this).attr('ids');
		ids = ids.split(',');
		$('#dlg_workout').show();	
		$('#dlg_workout').attr('idd', $(this).attr('idd'));	
		$('#dlg_workout .timepicker').val($(this).find('.wtime').text());
		html = "";
		for (i=0; i<exercises_list.length; i++) {
			item = exercises_list[i];
			selected = "";
			if (ids.indexOf(item.exercise_id) > -1) selected = "selected";
			html += `
				<option data-img-src="`+site_url+`/images/`+item['exercise_image']+`" value="`+item['exercise_id']+`" `+selected+`>`+item['exercise_title']+`</option>`;
		}
		$('#workout_select').html(html);
		$("#workout_select").trigger("chosen:updated");	
		chosen = $("#workout_select").data('chosen');
  	$("#workout_select").trigger('chosen:hiding_dropdown',{chosen:chosen});
	})
}

function updateDiet(ids, time, data, id, append=true, sday=null) {
  // ================= close dialog ====================
  html = `<div class='wdata' ids='`+ids+`' idd='`+id+`' id='ddata_`+id+`'>
        <div class='wdelete'><i class='dripicons-trash'></i></div>
      <div class='wtime'>`+ time +`</div>
      <div class='wplan'>` + data + `</div>
  </div>`;
  if (append) {
   $('.div_diet .data_' + (sday ? sday : sel_day)).append(html);
  } else {
    $('#ddata_'+id).attr('ids', ids);
    $('#ddata_'+id).html(`
      <div class='wdelete'><i class='dripicons-trash'></i></div>
      <div class='wtime'>`+ time +`</div>
      <div class='wplan'>` + data + `</div>
    `);
  }
  // ================= events ===================
  $('.div_diet .wdelete').unbind('click');
  $('.div_diet .wdelete').click(function(e) {
    e.preventDefault(false);
    var form_data = new FormData(); 
    form_data.append('id', $(this).parent().attr('idd'));
    $.ajax({
        type: "post",
        url: '../json/delete_user_diet.php',
        cache: false,
        processData: false, 
        contentType: false,
        data: form_data,
        success: function(res) { 
        },
        error: function(err) {
            console.log(err);
        },
        dataType: 'json'
    })
    $(this).parent().remove();
  })
  $('.div_diet .wdata').unbind('click');
  $('.div_diet .wdata').click(function() {
    sel_day = $(this).parent().attr('day');
    sel_year = $(this).parent().attr('year');
    sel_month = $(this).parent().attr('month');
    ids = $(this).attr('ids');
    ids = ids.split(',');
    $('#dlg_diet').show();  
    $('#dlg_diet').attr('idd', $(this).attr('idd')); 
    $('#dlg_diet .timepicker').val($(this).find('.wtime').text());
    html = "";
    for (i=0; i<food_list.length; i++) {
      item = food_list[i];
      selected = "";
      if (ids.indexOf(item.diet_id) > -1) selected = "selected";
      html += `
        <option data-img-src="`+site_url+`/images/`+item['diet_image']+`" value="`+item['diet_id']+`" `+selected+`>`+item['diet_title']+`</option>`;
    }
    $('#diet_select').html(html);
    $("#diet_select").trigger("chosen:updated");
    chosen = $("#diet_select").data('chosen');
    $("#diet_select").trigger('chosen:hiding_dropdown',{chosen:chosen});
  })
}

var cur_date = new Date();
var sel_day;
var sel_year;
var sel_month;
var startDate;
var endDate;

function getSelectedOptionsMe(chosen){
    var items    = []
    var options  = $(chosen.form_field).find('option:selected') || []
    var spans    = (chosen.is_multiple) ? $(chosen.container).find('.chosen-choices span'):
                                          $(chosen.container).find('.chosen-single span')

    for(var i = 0; i < options.length; i++)
        for(var j = 0; j < spans.length; j++)
            if($(spans[j]).text() == $(options[i]).text())
                items.push(options[i].value)

    return items
}
function addEvent() {
  $('.div_workout .adds span').unbind('click');
  $('.div_workout .adds span').click(function() {
    sel_day = $(this).attr('day');
    sel_year = $(this).attr('year');
    sel_month = $(this).attr('month');
    $('#dlg_workout').show();
    $('#dlg_workout').attr('idd', 0);  
    $("#workout_select").prop('selectedIndex', -1);
    $("#workout_select").trigger("chosen:updated");
  })

  $('.div_diet .adds span').unbind('click');
  $('.div_diet .adds span').click(function() {
    sel_day = $(this).attr('day');
    sel_year = $(this).attr('year');
    sel_month = $(this).attr('month');
    $('#dlg_diet').show();
    $('#dlg_diet').attr('idd', 0);
    $("#diet_select").prop('selectedIndex', -1);
    $("#diet_select").trigger("chosen:updated");
  })

}
function initCalendar() {
	var curr = new Date(cur_date); // get current date
	var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
	var last = first + 6; // last day is the first day + 6

	var firstday = new Date(curr.setDate(first));
	var lastday = new Date(curr.setDate(last));
  startDate = getDate1(firstday);
  endDate = getDate1(lastday);
  console.log(firstday);

	$('.div_calendar').each(function() {
		$(this).find('h3').html(dateFormat(firstday) + " - " + dateFormat(lastday));
		days = "";
		html = "";
		html_add = "";
		var cur = new Date(firstday);
		for (i=0; i<7; i++) {
			var d = first + i;
			d = new Date(cur.setDate(d));
			y = d.getFullYear();
			m = d.getMonth() + 1;
			d = d.getDate();
			days += "<span>" + d + "</span>";
			html += `<div class='data_sec data_`+d+`' year='`+y+`' month='`+m+`' day='`+d+`'></div>`;
			html_add += `<span year='`+y+`' month='`+m+`' day='`+d+`'><i class="dripicons-plus"></i></span>`;
		}
		$(this).find('.days').html(days);
		$(this).find('.data_sec_cont').html(html);
		$(this).find('.adds').html(html_add);
	})
  addEvent();
}

function loadDataWorkout() {
  $('#loading').show();
  var form_data = new FormData(); 
  form_data.append('user_id', $('#user_id').val());
  $.ajax({
      type: "post",
      url: '../json/get_user_workout.php',
      cache: false,
      processData: false, 
      contentType: false,
      data: form_data,
      success: function(res) { 
        list = res.ret;
        for (i=0; i<list.length; i++) {
          item = list[i];
          if (item.date >= startDate && item.date <= endDate) {
            ids = item.data.split(',');
            data = "";
            for (j=0; j<ids.length; j++) {
              edata = "";
              for (k=0; k<exercises_list.length; k++) {
                if (exercises_list[k].exercise_id == ids[j]*1) {
                  edata = exercises_list[k];
                  break;
                }
              }
              data += `<div>` + edata.exercise_title + `</div>`;
            }
            sday = 1 * (item.date.split('-')[2]);
            updateWorkout(item.data, item.time, data, item.id, true, sday);
          }
        }
        $('#loading').hide();
      },
      error: function(err) {
        $('#loading').hide();
        console.log(err);
      },
      dataType: 'json'
  })
}

function loadDataDiet() {
  var form_data = new FormData(); 
  form_data.append('user_id', $('#user_id').val());
  $.ajax({
      type: "post",
      url: '../json/get_user_diet.php',
      cache: false,
      processData: false, 
      contentType: false,
      data: form_data,
      success: function(res) { 
        list = res.ret;
        for (i=0; i<list.length; i++) {
          item = list[i];
          if (item.date >= startDate && item.date <= endDate) {
            ids = item.data.split(',');
            data = "";
            for (j=0; j<ids.length; j++) {
              edata = "";
              for (k=0; k<food_list.length; k++) {
                if (food_list[k].diet_id == ids[j]*1) {
                  edata = food_list[k];
                  break;
                }
              }
              data += `<div>` + edata.diet_title + `</div>`;
            }
            sday = 1 * (item.date.split('-')[2]);
            updateDiet(item.data, item.time, data, item.id, true, sday);
          }
        }
      },
      error: function(err) {
          console.log(err);
      },
      dataType: 'json'
  })
}

function dateFormat(date) {
	date = new Date(date);
	var month_names =["Jan","Feb","Mar",
                      "Apr","May","Jun",
                      "Jul","Aug","Sep",
                      "Oct","Nov","Dec"];
    
    var day = date.getDate();
    var month_index = date.getMonth();
    var year = date.getFullYear();
    
    return month_names[month_index] + " " + day + " " + year;
}

function getDate1(date) {
  date = new Date(date);    
  var day = date.getDate();
  var month = date.getMonth()+1;
  var year = date.getFullYear();
  return year + '-' + (month<10 ?'0'+month : month) + '-' +  (day<10 ?'0'+day : day);
  return date;
}
function getDate() {
	date = sel_year + '-' + (sel_month<10 ?'0'+sel_month : sel_month) + '-' +  (sel_day<10 ?'0'+sel_day : sel_day);
	return date;
}