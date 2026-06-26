const sharp = require('sharp');

const jobs = [
  { src: 'assets/images/logo1.png', out: 'assets/images/logo1.webp', width: 248, quality: 82 },
  { src: 'assets/images/4.jpg', out: 'assets/images/4.webp', width: 585, quality: 78 },
  { src: 'admin/uploads/image.jpg', out: 'admin/uploads/image.webp', width: 1847, quality: 52 },
  { src: 'admin/uploads/1.jpg', out: 'admin/uploads/1.webp', width: 200, quality: 78 },
  { src: 'admin/uploads/supply-chain-management.jpg', out: 'admin/uploads/supply-chain-management.webp', width: 196, quality: 78 },
  { src: 'admin/uploads/Cold Storage Warehouse.jpg', out: 'admin/uploads/Cold Storage Warehouse.webp', width: 254, quality: 78 },
  { src: 'assets/images/services/icons/1.png', out: 'assets/images/services/icons/1.webp', width: 140, quality: 82 },
  { src: 'assets/images/services/icons/2.png', out: 'assets/images/services/icons/2.webp', width: 140, quality: 82 },
  { src: 'assets/images/services/icons/3.png', out: 'assets/images/services/icons/3.webp', width: 140, quality: 82 },
  { src: 'assets/images/services/icons/4.png', out: 'assets/images/services/icons/4.webp', width: 140, quality: 82 },
  { src: 'assets/images/services/icons/modify/1.png', out: 'assets/images/services/icons/modify/1.webp', width: 140, quality: 82 },
  { src: 'assets/images/services/icons/modify/2.png', out: 'assets/images/services/icons/modify/2.webp', width: 128, quality: 82 },
  { src: 'assets/images/services/icons/modify/3.png', out: 'assets/images/services/icons/modify/3.webp', width: 128, quality: 82 },
  { src: 'assets/images/services/icons/modify/4.png', out: 'assets/images/services/icons/modify/4.webp', width: 128, quality: 82 },
  { src: 'assets/images/services/icons/modify/5.png', out: 'assets/images/services/icons/modify/5.webp', width: 128, quality: 82 },
  { src: 'assets/images/services/icons/modify/6.png', out: 'assets/images/services/icons/modify/6.webp', width: 128, quality: 82 },
  { src: 'assets/images/services/icons/modify/7.png', out: 'assets/images/services/icons/modify/7.webp', width: 128, quality: 82 },
  { src: 'assets/images/services/icons/modify/8.png', out: 'assets/images/services/icons/modify/8.webp', width: 120, quality: 82 },
];

(async () => {
  for (const job of jobs) {
    await sharp(job.src)
      .resize({ width: job.width, withoutEnlargement: true })
      .webp({ quality: job.quality, effort: 6 })
      .toFile(job.out);
    const meta = await sharp(job.out).metadata();
    console.log(`${job.out} ${meta.width}x${meta.height}`);
  }
})().catch((error) => {
  console.error(error);
  process.exit(1);
});
