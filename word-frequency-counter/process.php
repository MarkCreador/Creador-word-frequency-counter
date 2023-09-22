<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #333;
            margin-top: 20px;
        }
        th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #555;
            text-align: left;
        }
        td {
            padding: 8px;
            border: 1px solid #ccc;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Word Frequency Results</h1>

    <?php
    // Function to calculate word frequency while ignoring stop words
    function calculateWordFrequency($words) {
        $stopWords = ["the", "and", "in"]; // Common stop words to ignore
        
        $wordFrequency = array_count_values($words);
        
        // Remove stop words from the frequency array
        foreach ($stopWords as $stopWord) {
            unset($wordFrequency[$stopWord]);
        }
        
        return $wordFrequency;
    }

    // Function to sort word frequency based on user's choice
    function sortWordFrequency($wordFrequency, $sortOrder) {
        if ($sortOrder === "asc") {
            asort($wordFrequency);
        } else {
            arsort($wordFrequency);
        }
        return $wordFrequency;
    }

    // Function to limit the number of words displayed
    function limitWordFrequency($wordFrequency, $limit) {
        return array_slice($wordFrequency, 0, $limit);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve user input
        $inputText = $_POST['text'];
        $selectedSortOrder = $_POST['sort']; // 'asc' or 'desc'
        $selectedLimit = $_POST['limit']; // Number of words to display

        // Tokenize the input text into words
        $words = str_word_count(strtolower($inputText), 1);

        // Calculate word frequency
        $wordFrequency = calculateWordFrequency($words);

        // Sort word frequency based on user's choice
        $sortedWordFrequency = sortWordFrequency($wordFrequency, $selectedSortOrder);

        // Limit the number of words to display
        $limitedWordFrequency = limitWordFrequency($sortedWordFrequency, $selectedLimit);
        
        // Output the results in a styled table
        echo '<table>';
        echo '<tr><th>Word</th><th>Frequency</th></tr>';
        
        foreach ($limitedWordFrequency as $word => $frequency) {
            echo "<tr><td>$word</td><td>$frequency</td></tr>";
        }
        
        echo '</table>';
    } else {
        // Handle the case where the form is not submitted
        echo '<p>No data submitted.</p>';
    }
    ?>

</body>
</html>
