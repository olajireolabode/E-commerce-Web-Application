<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply Message</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Link to go back to the admin landing page -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=admin&action=landingPage">Go back to Admin Landing Page</a>
                </li>
                <!-- Link to Display Product Details -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=product&action=displayDetails">Products</a>
                </li>
                <!-- Link to View Gyms -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=gym&action=displayDetails">Gyms</a>
                </li>
                <!-- Link to View Trainers -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=trainer&action=displayDetails">Trainers</a>
                </li>
                <!-- Link to View UserMessage -->
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=admin&action=usermessage">UserMessage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1>Reply Message</h1>
    <?php
    if (!isset($_GET['pk'])) {
        header('Location: index.php?controller=admin&action=usermessage');
    }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and process form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        print_r($name);
        print_r($email);
        print_r($message);
        // Display a thank you message or redirect
        echo "<p>Thank you, $name, for your submission!</p>";
    }
    ?>

    <p>Feel free to reach out to us using the contact form below:</p>


    <!-- Contact form -->
    <form action="index.php?controller=admin&action=postmessagereply" method="post">
        <input type="hidden" id="pk" name="pk" value="<?php echo $_GET['pk'] ?>"><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br>

        <input type="submit" name="action" value="Submit">
    </form>
    <div class="d-flex p-2 bd-highlight justify-content-center">
        <div class="accordion accordion-flush w-50 border border-light-subtle " id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading<?php echo $question['pk']; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $question['pk']; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $question['pk']; ?>">
                        <?php echo ($question['name']); ?>
                    </button>

                </h2>
                <div id="flush-collapse<?php echo $question['pk']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $question['pk']; ?>" data-bs-parent="#accordionFlushExample">
                    <!-- <div class="accordion-body"><button type="button" class="btn btn-success m-2" data-bs-toggle="modal" id="exampleModalbtn" data-bs-target="#exampleModal" data-qid="<?php echo $question['pk']; ?>">
                            Reply
                        </button>
                    </div> -->
                    <div class="accordion-body"> <?php echo ("Descriptive message :" . $question['message']); ?></div>

                    <?php if (!isset($answers) || empty($answers)) { ?>
                        <div class="accordion-body">No Reply yet.</div>
                        <!-- Button trigger modal -->

                    <?php } else { ?>
                        <?php foreach ($answers as $answer) : ?>
                            <?php if (!isset($answer['sender']) || empty($answer['sender']) || $answer['sender'] == null) { ?>
                                <div class="accordion-body"><?php echo ("Admin:" . " " . $answer['message']); ?></div>
                            <?php } else { ?>
                                <div class="accordion-body"><?php echo ("User:" . " " . $answer['message']); ?></div>

                            <?php } ?>

                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" id="exampleModalbtn" data-bs-target="#exampleModal" data-qid="<?php echo $question['pk']; ?>">
                                    Reply
                                </button> -->
                        <?php endforeach; ?>
                    <?php } ?>


                </div>
            </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</html>