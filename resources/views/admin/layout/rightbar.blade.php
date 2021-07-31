<?php date_default_timezone_set('Asia/Jakarta');?>
<div class="app-content content ml-0">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper pl-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div id="kalendar"></div>
                    </div>
                </div>
            </div>
            {{-- JADWAL --}}
           
         
            <div class="card">
                <div class="card-header divider d-flex align-items-start pb-0">
                    <div>
                        <p>Total Perkara</p>
                        <h2 class="text-bold-700  mt-1">{{$total_perkara}}</h2>
                    </div>
                    <div class="avatar bg-rgba-primary p-50">
                        <div class="avatar-content">
                            <i class="feather icon-monitor text-primary font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <div class="card">
                <div class="card-header divider d-flex align-items-start pb-0">
                    <div>
                        <p>Masih Proses</p>
                        <h2 class="text-bold-700  mt-1">{{$masih_proses}}</h2>
                    </div>
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-alert-octagon text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <div class="card">
                <div class="card-header divider d-flex align-items-start pb-0">
                    <div>
                        <p>Selesai Unggah</p>
                        <h2 class="text-bold-700  mt-1">{{$terupload}}</h2>
                        
                    </div>
                    <div>
                        <p>Belum Terunggah</p>
                        <h2 class="text-bold-700  mt-1">{{$belum_terupload}}</h2>
                        
                    </div>
                    <div class="avatar bg-rgba-success p-50">
                        <div class="avatar-content">
                            <i class="feather icon-upload text-success font-medium-5"></i>
                        </div>
                    </div>
                </div>
                <br>
            </div>

               

<br />

<!-- calendar Modal starts-->
{{-- <div class="modal fade text-left modal-calendar" tabindex="-1" role="dialog" aria-labelledby="cal-modal" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-text-bold-600" id="cal-modal">Jadwal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <fieldset class="form-label-group">
                        <input type="text" class="form-control" id="cal-event-title" placeholder="Agenda" disabled />
                        <label for="cal-event-title">Agenda</label>
                    </fieldset>
                    <fieldset class="form-label-group">
                        <input type="text" class="form-control pickadate" id="cal-start-date" placeholder="Tanggal" disabled />
                        <label for="cal-start-date">Tanggal</label>
                    </fieldset>
                    <fieldset class="form-label-group">
                        <input type="text" class="form-control pickadate disabled" id="cal-end-date" placeholder="End Date" />
                        <label for="cal-end-date">End Date</label>
                    </fieldset>
                    <fieldset class="form-label-group">
                        <textarea class="form-control" id="cal-description" rows="5" placeholder="Description" disabled></textarea>
                        <label for="cal-description">Deskripsi</label>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<!-- calendar Modal ends-->
<script>
    /*=========================================================================================
    File Name: fullcalendar.js
    Description: Fullcalendar
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var kalendar = {!! $event!!};
// console.log(jadwal);
    document.addEventListener("DOMContentLoaded", function () {
        
        // color object for different event types
        var colors = {
            primary: "#7367f0",
            success: "#28c76f",
            danger: "#ea5455",
            warning: "#ff9f43",
        };

        // chip text object for different event types
        var categoryText = {
            primary: "Others",
            success: "Business",
            danger: "Personal",
            warning: "Work",
        };
        var categoryBullets = $(".cal-category-bullets").html(),
            evtColor = "#ff9f43",
            eventColor = "#ff9f43";

        // calendar init
        var calendarEl = document.getElementById("kalendar");

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ["dayGrid", "timeGrid", "interaction"],
            locale: 'id',
            //   customButtons: {
            //     addNew: {
            //       text: ' Add',
            //       click: function () {
            //         var calDate = new Date,
            //           todaysDate = calDate.toISOString().slice(0, 10);
            //         $(".modal-calendar").modal("show");
            //         $(".modal-calendar .cal-submit-event").addClass("d-none");
            //         $(".modal-calendar .remove-event").addClass("d-none");
            //         $(".modal-calendar .cal-add-event").removeClass("d-none")
            //         $(".modal-calendar .cancel-event").removeClass("d-none")
            //         $(".modal-calendar .add-category .chip").remove();
            //         $("#cal-start-date").val(todaysDate);
            //         $("#cal-end-date").val(todaysDate);
            //         $(".modal-calendar #cal-start-date").attr("disabled", false);
            //       }
            //     }
            //   },
            header: {
                left: "addNew",
                // center: "dayGridMonth,timeGridWeek,timeGridDay",
                right: "prev,title,next",
            },
            displayEventTime: false,
            navLinks: true,
            editable: false,
            allDay: true,
            
            
            navLinkDayClick: function (date) {
                $(".modal-calendar").modal("show");
            },
            
           
            events:kalendar,
            eventColor: '#E8523F',


            dateClick: function (info) {
                $(".modal-calendar #cal-start-date").val(info.dateStr).attr("disabled", true);
                $(".modal-calendar #cal-end-date").val(info.dateStr);
            },
            // displays saved event values on click
            // eventClick: function (info) {
            //     $(".modal-calendar").modal("show");
            //     $(".modal-calendar #cal-event-title").val('SIDANG');
            //     $(".modal-calendar #cal-start-date").val(moment(info.event.start).format('D MMMM Y'));
            //     $(".modal-calendar #cal-end-date").val(moment(info.event.end).format("YYYY-MM-DD"));
            //     $(".modal-calendar #cal-description").val(info.event.extendedProps.description);
            //     $(".modal-calendar .cal-submit-event").removeClass("d-none");
            //     $(".modal-calendar .remove-event").removeClass("d-none");
            //     $(".modal-calendar .cal-add-event").addClass("d-none");
            //     $(".modal-calendar .cancel-event").addClass("d-none");
            //     $(".calendar-dropdown .dropdown-menu").find(".selected").removeClass("selected");
            //     var eventCategory = info.event.extendedProps.dataEventColor;
            //     var eventText = categoryText[eventCategory];
            //     $(".modal-calendar .chip-wrapper .chip").remove();
            //     $(".modal-calendar .chip-wrapper").append($("<div class='chip chip-" + eventCategory + "'>" + "<div class='chip-body'>" + "<span class='chip-text'> " + eventText + " </span>" + "</div>" + "</div>"));
            // },
        });

        // render calendar
        calendar.render();

        // appends bullets to left class of header
        $("#basic-examples .fc-right").append(categoryBullets);

        // Close modal on submit button
        $(".modal-calendar .cal-submit-event").on("click", function () {
            $(".modal-calendar").modal("hide");
        });

        // Remove Event
        $(".remove-event").on("click", function () {
            var removeEvent = calendar.getEventById("newEvent");
            removeEvent.remove();
        });

        // reset input element's value for new event
        if ($("td:not(.fc-event-container)").length > 0) {
            $(".modal-calendar").on("hidden.bs.modal", function (e) {
                $(".modal-calendar .form-control").val("");
            });
        }

        // remove disabled attr from button after entering info
        $(".modal-calendar .form-control").on("keyup", function () {
            if ($(".modal-calendar #cal-event-title").val().length >= 1) {
                $(".modal-calendar .modal-footer .btn").removeAttr("disabled");
            } else {
                $(".modal-calendar .modal-footer .btn").attr("disabled", true);
            }
        });

        // open add event modal on click of day
        $(document).on("click", ".fc-day", function () {
            $(".modal-calendar").modal("show");
            $(".calendar-dropdown .dropdown-menu").find(".selected").removeClass("selected");
            $(".modal-calendar .cal-submit-event").addClass("d-none");
            $(".modal-calendar .remove-event").addClass("d-none");
            $(".modal-calendar .cal-add-event").removeClass("d-none");
            $(".modal-calendar .cancel-event").removeClass("d-none");
            $(".modal-calendar .add-category .chip").remove();
            $(".modal-calendar .modal-footer .btn").attr("disabled", true);
            evtColor = colors.primary;
            eventColor = "primary";
        });

        // change chip's and event's color according to event type
        $(".calendar-dropdown .dropdown-menu .dropdown-item").on("click", function () {
            var selectedColor = $(this).data("color");
            evtColor = colors[selectedColor];
            eventTag = categoryText[selectedColor];
            eventColor = selectedColor;

            // changes event color after selecting category
            $(".cal-add-event").on("click", function () {
                calendar.addEvent({
                    color: evtColor,
                    dataEventColor: eventColor,
                    className: eventColor,
                });
            });

            $(".calendar-dropdown .dropdown-menu").find(".selected").removeClass("selected");
            $(this).addClass("selected");

            // add chip according to category
            $(".modal-calendar .chip-wrapper .chip").remove();
            $(".modal-calendar .chip-wrapper").append($("<div class='chip chip-" + selectedColor + "'>" + "<div class='chip-body'>" + "<span class='chip-text'> " + eventTag + " </span>" + "</div>" + "</div>"));
        });

        // // calendar add event
        // $(".cal-add-event").on("click", function () {
        //     $(".modal-calendar").modal("hide");
        //     var eventTitle = $("#cal-event-title").val(),
        //         startDate = $("#cal-start-date").val(),
        //         endDate = $("#cal-end-date").val(),
        //         eventDescription = $("#cal-description").val(),
        //         correctEndDate = new Date(endDate);
        //     calendar.addEvent({
        //         id: "newEvent",
        //         title: eventTitle,
        //         start: startDate,
        //         end: correctEndDate,
        //         description: eventDescription,
        //         color: evtColor,
        //         dataEventColor: eventColor,
        //         allDay: true,
        //     });
        // });

        // date picker
        $(".pickadate").pickadate({
            format: "yyyy-mm-dd",
        });
    });
</script>
<script>
    var serverClock = jQuery("#jamServer");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }

    function showServerTime(obj, time) {
        var parts = time.split(":"),
            newTime = new Date();

        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));

        var timeDifference = new Date().getTime() - newTime.getTime();

        var methods = {
            displayTime: function () {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([methods.leadZeros(now.getHours(), 2), methods.leadZeros(now.getMinutes(), 2), methods.leadZeros(now.getSeconds(), 2)].join(":"));
                setTimeout(methods.displayTime, 500);
            },

            leadZeros: function (time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            },
        };
        methods.displayTime();
    }
</script>
