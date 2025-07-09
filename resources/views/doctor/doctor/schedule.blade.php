@extends('doctor.layouts.app')

@section('title', 'Mon emploi du temps')

@section('content')
    <div class="main-content">
        <div class="calendar-header">
            <button id="prevMonth" class="nav-btn">‹</button>
            <div class="calendar-title">
                <span id="monthTitle">{{ \Carbon\Carbon::now()->translatedFormat('F') }}</span>
                <span id="yearTitle">{{ \Carbon\Carbon::now()->year }}</span>
            </div>
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
            document.getElementById('monthTitle').textContent = current.format('MMMM');
            document.getElementById('yearTitle').textContent = current.format('YYYY');

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
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Roboto, sans-serif;
        }


        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1d77fe;
            color: #fff;
            padding: 20px 30px;
            font-size: 22px;
            font-weight: 600;
        }

        .calendar-header h1 {
            margin: 0;
            text-transform: capitalize;
        }

        .nav-btn {
            background: #ffffff;
            border: none;
            color: #1d77fe;
            font-size: 28px;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-btn:hover {
            background-color: #e0f0ff;
            transform: scale(1.1);
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            border-top: 1px solid #ddd;
        }

        .day-name {
            background: #f0f4f8;
            padding: 15px;
            text-align: center;
            font-weight: 600;
            border-bottom: 1px solid #ddd;
            color: #333;
            text-transform: uppercase;
            font-size: 13px;
        }

        .day-cell {
            border: 1px solid #f1f1f1;
            padding: 10px;
            min-height: 120px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            transition: background 0.2s ease;
            position: relative;
            height: 150px;
            width: 150px;
            overflow: hidden;
        }

        .day-cell:hover {
            background: #f8fbff;
        }

        .disabled {
            background: #f8f8f8;
            color: #b5b5b5;
        }

        .today {
            border: 2px solid #1d77fe;
            background: #e8f1ff;
        }

        .day-number {
            font-weight: bold;
            font-size: 15px;
            color: #222;
        }

        .events-list {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            max-height: 100px;
            gap: 6px;
            overflow-y: auto;
            padding-right: 5px;
            margin-top: 6px;
            scrollbar-width: thin;
            scrollbar-color: #1d77fe #f1f1f1;
        }
/* Chrome, Safari, Edge (basés sur Chromium) */
.events-list::-webkit-scrollbar {
    width: 6px;
}

.events-list::-webkit-scrollbar-thumb {
    background-color: #1d77fe;
    border-radius: 4px;
}

.events-list::-webkit-scrollbar-track {
    background-color: #f1f1f1;
}



        .event {
            background: #d8edff;
            border-left: 4px solid #1d77fe;
            padding: 6px 8px;
            border-radius: 6px;
            font-size: 13px;
            color: #1a1a1a;
            transition: background 0.2s ease;
            cursor: pointer;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.05);
        }

        .event:hover {
            background-color: #cde6ff;
        }

        .event-time {
            font-weight: 600;
            color: #1d77fe;
        }

        #monthTitle,
        #yearTitle {
            font-size: 24px;
            font-weight: 600;
            color: #ffffff;
        }
    </style>

@endsection
