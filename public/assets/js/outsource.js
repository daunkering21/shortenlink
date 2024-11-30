// Fungsi untuk mendapatkan IP klien
async function getClientIP() {
  const response = await fetch('https://api.ipify.org?format=json'); // API untuk mendapatkan IP
  const data = await response.json();
  return data.ip;
}

// IP yang diizinkan
const allowedIPs = ['192.168.3.247', '123.45.67.89'];

// Validasi IP
getClientIP().then(clientIP => {
  if (allowedIPs.includes(clientIP)) {
      console.log('masuk');
  } else {
      console.error('Akses ditolak: IP tidak diizinkan.');
  }
});
