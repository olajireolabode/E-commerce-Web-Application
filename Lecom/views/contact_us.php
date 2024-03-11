<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php?controller=home&action=index">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <?php if (!isset($_SESSION['user'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=user&action=login">Login</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=home&action=contactUs">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=home&action=aboutUs">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=home&action=otherServices">Other Services</a>
                </li>
                <?php if(isset($_SESSION['user']))  { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=cart&action=viewCart">Cart</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <!-- If the user is login in, show the logout button -->
                    <?php if(isset($_SESSION['user']))  { ?>
                    <a class="nav-link" href="logout.php">Logout</a>
                        <?php } ?>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Contact Us</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and process form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        // Display a thank you message or redirect
        echo "<p>Thank you, $name, for your submission!</p>";
    }
    ?>

    <p>Feel free to reach out to us using the contact form below:</p>


    <!-- Contact form -->
    <form action="index.php?controller=userquestion&action=addquestion" method="post">
        <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['user']['user_name'] ?? "" ?>"><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea><br>

        <input type="submit" name="action" value="Submit">
    </form>
    <div class="d-flex p-2 bd-highlight justify-content-center">
        <div class="accordion accordion-flush w-50 " id="accordionFlushExample">
            <?php foreach ($user_question as $question) : ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading<?php echo $question['pk']; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $question['pk']; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $question['pk']; ?>">
                            <?php echo ($question['name']); ?>
                        </button>

                    </h2>
                    <div id="flush-collapse<?php echo $question['pk']; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $question['pk']; ?>" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"><button type="button" class="btn btn-success m-2" data-bs-toggle="modal" id="exampleModalbtn" data-bs-target="#exampleModal" data-qid="<?php echo $question['pk']; ?>">
                                Reply
                            </button>
                        </div>
                        <div class="accordion-body"> <?php echo ("Message :".$question['message']); ?></div>

                        <?php if (!isset($question['question_ans']) || empty($question['question_ans'])) { ?>
                            <div class="accordion-body">No Reply yet.</div>
                            <!-- Button trigger modal -->

                        <?php } else { ?>
                            <?php foreach ($question['question_ans'] as $answer) : ?>
                                <?php if (!isset($answer['sender']) || empty($answer['sender']) || $answer['sender'] == null) { ?>
                                    <div class="accordion-body"><?php echo ("Admin:" . " " . $answer['message']); ?></div>
                                <?php } else { ?>
                                    <div class="accordion-body"><?php echo ("You:" . " " . $answer['message']); ?></div>

                                <?php } ?>

                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-success m-2" data-bs-toggle="modal" id="exampleModalbtn" data-bs-target="#exampleModal" data-qid="<?php echo $question['pk']; ?>">
                                    Reply
                                </button> -->
                            <?php endforeach; ?>
                        <?php } ?>


                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="index.php?controller=admin&action=postmessagereplysfromuser" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="qpk" name="qpk" value=""><br>
                        <label for="messages">Message:</label>
                        <textarea id="message" name="message" rows="4" required></textarea><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event) {

            // Extract data from the button that triggered the modal
            var button = $(event.relatedTarget);
            var qid = button.data('qid');

            // Update modal content with the qid
            $('#qpk').val(qid);
        });
    });
</script>

</html>