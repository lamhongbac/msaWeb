Add-Type -AssemblyName System.IO.Compression.FileSystem
$sourcePath = "D:\GGDrive\02 Nov MatBao_HDSD_ hosting_DirectAdmin.docx"
$tempPath = "D:\Projects\FnBTrainingAI\LandingPageAIChampionFnB\temp_docx_copy.docx"

Copy-Item -Path $sourcePath -Destination $tempPath -Force

$zip = [System.IO.Compression.ZipFile]::OpenRead($tempPath)
$docXmlEntry = $zip.Entries | Where-Object { $_.FullName -eq 'word/document.xml' }
if ($docXmlEntry) {
    $stream = $docXmlEntry.Open()
    $reader = [System.IO.StreamReader]::new($stream)
    $xml = $reader.ReadToEnd()
    $reader.Close()
    $stream.Close()
    
    # Simple replace to simulate newlines on paragraphs and remove other tags
    $text = $xml -replace '<w:p\b[^>]*>', "`n" -replace '<[^>]+>', '' -replace '&amp;', '&' -replace '&lt;', '<' -replace '&gt;', '>'
    Write-Output $text
} else {
    Write-Output "Could not find word/document.xml"
}
$zip.Dispose()

Remove-Item -Path $tempPath -Force
