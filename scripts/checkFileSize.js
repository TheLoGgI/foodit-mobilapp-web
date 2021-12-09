function checkSize(input) {
  const fileSize = input.files[0].size / 1024 / 1024; // in MiB
  if (fileSize > 2) {
    alert("Den valgte fil er for stor.");
  }
}

export default checkSize;
