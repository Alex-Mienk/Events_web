<!-- html page for creating an event. It is inserted into the database -->

<!DOCTYPE html> <html lang="en"> 
<head> 
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adding new event</title> 
<link rel="stylesheet" type="text/css" href = css/main.css>
</head>
<body style="background-color: #b1a296;">
    <div class="container"> 
        <div class="header">
            <h1>Club Hub</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 style="color:white;">Create an Event</h2>
                <form style="color:white;" action = "includes/add_new_event.inc.php" method = "post">
                    <div class="form-group">
                        <label for="eventName">Event Name:</label>
                        <input type="text" name="event_name" placeholder="Enter event name">
                    </div>
                    <div class="form-group">
                        <label for="eventDate">Event Date(required):

                        </label>
                        <input type="date" name="event_date"> </div>
                        <div class="form-group">
                            <label for="eventLocation">Event Location:

                            </label>
                            <input type="text" name="event_location" placeholder="Enter event location">
                        </div> 
                        <div class="form-group">
                            <label for="eventDescription">Event Description:</label>
                            <textarea name = "event_description" rows="3" placeholder="Enter event description"></textarea>
                        </div>
                        <button class="create_event">Create Event</button>
                    </form> 
                </div> 
                <div></div>
                <div>
                    <a href="index.php"><button class="login_button">To the login page!</button></a>
                </div>
                <div>
                    <a href="main.php"><button class="main_button">To the main page!</button></a>
                </div>