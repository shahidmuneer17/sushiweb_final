<!-- resources/views/import-sql.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Import SQL Result</title>
</head>
<body>
    @if(isset($message))
        <h1>{{ $message }}</h1>
    @elseif(isset($error))
        <h1>Error:</h1>
        <p>{{ $error }}</p>
    @endif
</body>
</html>
