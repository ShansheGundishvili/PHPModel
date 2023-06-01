$tagsFile = "tags.txt"
$filesFolder = "TMP"

# Read the tags from tags.txt and extract the "//<tag>" portion
$tags = Get-Content $tagsFile | ForEach-Object { [regex]::Matches($_, "//<[^>]+>") } | ForEach-Object { $_.Value }


# Iterate through each file in the folder
$files = Get-ChildItem -Recurse -Path $filesFolder -File 

foreach ($file in $files) {
    # Read the content of the file
    $content = Get-Content $file.FullName -Raw

    # Iterate through each tag
    foreach ($tag in $tags) {
        $openingTag = [regex]::Escape($tag)
        $closingTag = [regex]::Escape($tag.Replace("<", "</"))

        # Remove the text between the tags
        $content = $content -replace "(?s)$openingTag.*?$closingTag", ""
    }
    # Overwrite the file with the modified content
    $content | Set-Content $file.FullName -Force
}

Write-Host "Text removal completed."
