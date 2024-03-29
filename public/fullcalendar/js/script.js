    var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
       // $('#event-booking-details-modal').modal('show');
       
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
               // console.log(row);
               // events.push({ id: row.id, title: row.name, start: row.start_datetime, end: row.end_datetime });
                events.push({ id: row.id, title: row.name,start: row.start, end: row.end,event_length:row.event_length,description:row.description});
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        calendar = new Calendar(document.getElementById('calendar'), {
            headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            //Random default events
            events: events,
            eventClick: function(info) {
                var _details = $('#event-details-modal')
                var id = info.event.id
                //console.log(scheds[id].name);
                if (!!scheds[id]) {
                    console.log("details"+scheds);
                    _details.find('#title').text(scheds[id].name)
                    _details.find('#description').text(scheds[id].description)
                    _details.find('#length').text(scheds[id].event_length)
                    _details.find('#start').text(scheds[id].start)
                    _details.find('#end').text(scheds[id].end)
                    _details.find('#edit,#delete').attr('data-id', id)
                    _details.modal('show')
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Do Something after events mounted
            },
            editable: true
        });
        
        calendar.render();

        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                //alert('ss');
                console.log(scheds[id]);
                var _form = $('#schedule-form')
                console.log(String(scheds[id].start_datetime), String(scheds[id].start_datetime).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="name"]').val(scheds[id].name)
                _form.find('[name="description"]').val(scheds[id].description)
                _form.find('[name="event_date"]').val(String(scheds[id].start).replace(" ", "T"))
                _form.find('[name="event_date"]').val(String(scheds[id].start).replace(" ", "T"))
                $('#event-details-modal').modal('hide')
                _form.find('[name="title"]').focus()
            } else {
                alert("Event is undefined");
            }
        })

        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _conf = confirm("Are you sure to delete this scheduled event?");
                if (_conf === true) {
                    location.href = "./delete-event/" + id;
                    //location.href = "./delete_schedule.php?id=" + id;
                }
            } else {
                alert("Event is undefined");
            }
        })
    })