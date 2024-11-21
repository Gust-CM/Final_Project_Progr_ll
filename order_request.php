<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2 class="text-center mb-4">Request a Book</h2>
    <form action="submit_request.php" method="POST">
        <div class="mb-3">
            <label for="bookTitle" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="bookTitle" name="book_title" required>
        </div>
        <div class="mb-3">
            <label for="authorName" class="form-label">Author Name</label>
            <input type="text" class="form-control" id="authorName" name="author_name">
        </div>
        <div class="mb-3">
            <label for="contactInfo" class="form-label">Your Contact Information</label>
            <input type="email" class="form-control" id="contactInfo" name="contact_info" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>

</body>
</html>

<?php
include 'footer.php';
?>