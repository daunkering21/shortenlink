async function getClientIP() {
  const response = await fetch('https://api.ipify.org?format=json'); // API untuk mendapatkan IP
  const data = await response.json();
  return data.ip;
}

const allowedIPs = ['202.178.121.42'];

function getQueryRoute() {
  const queryString = window.location.search; // Mendapatkan seluruh query string
  return queryString.startsWith('?') ? queryString.slice(1) : null; // Menghapus tanda '?' dan mengembalikan string
}

getClientIP().then(clientIP => {
  if (allowedIPs.includes(clientIP)) {
        // Mendapatkan route dari query string
        const route = getQueryRoute();
        if (route) {
            console.log(`Route ditemukan: ${route}`);
            // Tambahkan logika berdasarkan route
            switch (route) {
                case 'test_page':
                    console.log('Jalankan logika untuk test_page');
                    break;
                case 'dashboard':
                    console.log('Jalankan logika untuk dashboard');
                    break;
                case 'profile':
                    console.log('Jalankan logika untuk profile');
                    break;
                default:
                    console.log('Route tidak dikenali, gunakan default logic');
            }
        }
  }
});
