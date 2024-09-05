<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="appointment.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezyvet</title>
    <!-- this is my fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="_assets/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        /* CSS for layout and buttons */
        .time-slot {
            display: inline-block;
            margin: 5px;
            padding: 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .time-slot.disabled {
            background-color: #ccc;
            pointer-events: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Choose Your Appointment Date & Time</h2>
        <label for="appointmentDate">Appointment Date:</label>
        <input type="date" id="appointmentDate" min="2024-09-06">

        <h3>Available Time Slots</h3>
        <div id="timeSlots"></div>

        <button type="submit" id="bookAppointment">Book Appointment</button>
    </div>

    <script>
        // Clinic hours
        const clinicHours = {
            monday: {
                open: "08:00",
                close: "18:00"
            },
            tuesday: {
                open: "08:00",
                close: "18:00"
            },
            wednesday: {
                open: "08:00",
                close: "18:00"
            },
            thursday: {
                open: "08:00",
                close: "18:00"
            },
            friday: {
                open: "08:00",
                close: "18:00"
            },
            saturday: {
                open: "08:00",
                close: "18:00"
            },
            sunday: {
                open: "closed",
                close: "closed"
            }
        };

        const bookedSlots = {
            "2024-09-17": ["09:00", "10:00", "11:00"]
            // Add booked slots for other days as needed
        };

        function generateTimeSlots() {
            const date = document.getElementById('appointmentDate').value;
            const dayOfWeek = new Date(date).toLocaleString('en-us', {
                weekday: 'long'
            }).toLowerCase();

            const slotsDiv = document.getElementById('timeSlots');
            slotsDiv.innerHTML = ''; // Clear previous slots

            if (clinicHours[dayOfWeek].open === "closed") {
                slotsDiv.innerHTML = '<p>The clinic is closed on this day.</p>';
                return;
            }

            const start = clinicHours[dayOfWeek].open;
            const end = clinicHours[dayOfWeek].close;

            let currentTime = new Date(`${date}T${start}`);
            const endTime = new Date(`${date}T${end}`);

            while (currentTime < endTime) {
                const timeStr = currentTime.toTimeString().substring(0, 5);

                const slot = document.createElement('div');
                slot.className = 'time-slot';
                slot.innerText = timeStr;

                // Disable if already booked
                if (bookedSlots[date] && bookedSlots[date].includes(timeStr)) {
                    slot.classList.add('disabled');
                }

                slotsDiv.appendChild(slot);

                // Increment by 1 hour (or any interval you prefer)
                currentTime.setMinutes(currentTime.getMinutes() + 60);
            }
        }

        document.getElementById('appointmentDate').addEventListener('change', generateTimeSlots);
    </script>

</body>

</html>