<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background for better contrast */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card-custom {
            border: 2px solid #007bff; /* Blue border */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .card-img-top {
            width: 30%; /* Decreased size of the image */
            margin: 20px auto 10px auto; /* Center the image with margin */
            border-radius: 50%; /* Circular frame */
        }
        .more-content {
            display: none;
        }
        .more-link {
            display: block; /* Ensure the link moves to the next line */
            cursor: pointer;
            color: #007bff;
            text-decoration: none;
        }
        .price {
            color: red; /* Red color for price */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card card-custom">
            <img src="https://via.placeholder.com/80" class="card-img-top" alt="Product Image">
            <div class="card-body text-center">
                <h5 class="card-title">Product Name</h5>
                <p class="card-text price">Price: $99.99</p>
                <p class="card-text description">
                    This is a short product description. 
                    <span class="more-content">Here is the extended description that is initially  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores?hidden.</span>
                </p>
                <a href="#" class="more-link" id="toggleMoreLink">More</a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('toggleMoreLink').addEventListener('click', function(event) {
            event.preventDefault();
            var moreContent = document.querySelector('.more-content');
            var linkText = this;

            if (moreContent.style.display === 'none' || moreContent.style.display === '') {
                moreContent.style.display = 'inline';
                linkText.textContent = 'Less';
            } else {
                moreContent.style.display = 'none';
                linkText.textContent = 'More';
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
