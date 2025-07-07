@extends('doctor.layouts.app')

@section('title', 'Mon emploi du temps')

@section('content')
    <div class="main-content">
        <div class="calendar-header">
            <button id="prevMonth" class="nav-btn">‹</button>
            <h1 id="monthTitle">{{ \Carbon\Carbon::now()->translatedFormat('F') }} <span
                    id="yearTitle">{{ \Carbon\Carbon::now()->year }}</span></h1>
            <button id="nextMonth" class="nav-btn">›</button>
        </div>
        <div class="calendar" id="calendarGrid">
            {{-- Les jours et cellules seront générés par JS --}}
        </div>
    </div>

    {{-- Passer les rendez-vous au JS --}}
    <script>
        window.appointments = @json($appointments);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script>
        const appointments = window.appointments;

        const dayNames = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];
        let current = moment();

        function renderCalendar() {
            const start = current.clone().startOf('month').startOf('week');
            const end = current.clone().endOf('month').endOf('week');
            const $grid = document.getElementById('calendarGrid');
            $grid.innerHTML = '';

            // Header
            dayNames.forEach(d => {
                const el = document.createElement('div');
                el.className = 'day-name';
                el.textContent = d;
                $grid.appendChild(el);
            });

            // Cells
            let date = start.clone();
            while (date.isSameOrBefore(end, 'day')) {
                const cell = document.createElement('div');
                cell.className = 'day-cell';
                if (date.month() !== current.month()) cell.classList.add('disabled');

                if (date.isSame(moment(), 'day')) cell.classList.add('today');

                const dayNum = document.createElement('div');
                dayNum.textContent = date.date();
                dayNum.className = 'day-number';
                cell.appendChild(dayNum);

                const dayAppts = appointments.filter(a => a.appointment_date === date.format('YYYY-MM-DD'));
                const list = document.createElement('div');
                list.className = 'events-list';
                dayAppts.forEach(a => {
                    const ev = document.createElement('div');
                    ev.className = 'event';
                    ev.innerHTML = `<span class="event-time">${a.appointment_time}</span><br>
                        <span class="event-title">${a.message.substring(0, 30)}</span>`;
                    list.appendChild(ev);
                });
                cell.appendChild(list);
                $grid.appendChild(cell);

                date.add(1, 'day');
            }

            // Update header
            document.getElementById('monthTitle').innerHTML =
                `${current.format('MMMM')} <span id="yearTitle">${current.format('YYYY')}</span>`;

        }

        document.getElementById('prevMonth').addEventListener('click', () => {
            current.subtract(1, 'month');
            renderCalendar();
        });
        document.getElementById('nextMonth').addEventListener('click', () => {
            current.add(1, 'month');
            renderCalendar();
        });

        // Lancer la première fois
        renderCalendar();
    </script>

    <style>
        .calendar-container {
            max-width: 1000px;
            margin: 30px auto;
            background: #fff;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: #f1f4f8;
            border-bottom: 1px solid #ddd;
        }

        .nav-btn {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-auto-rows: minmax(120px, auto);
        }

        .day-name {
            background: #f7f9fc;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
        }

        .day-cell {
            border: 1px solid #eee;
            padding: 5px;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .disabled {
            background: #fafafa;
            color: #ccc;
        }

        .today {
            background: #e7f5ff;
            border: 2px solid #339af0;
        }

        .day-number {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .events-list {
            flex: 1;
            overflow-y: auto;
            display: flex;
            gap: 7px;
            flex-direction: column;
        }

        .event {
            background: #e0f6ff;
            border-left: 4px solid #339af0;
            margin-bottom: 4px;
            padding: 4px 6px;
            border-radius: 3px;
            font-size: 12px;
        }

        .event-time {
            font-weight: bold;
        }

        #yearTitle,
        #monthTitle {
            font-weight: normal;
            font-size: 20px;
            margin-left: 6px;
            color: #339af0;
        }
    </style>
@endsection
