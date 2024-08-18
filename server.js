const express = require('express');
const nodemailer = require('nodemailer');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

app.use(bodyParser.json());

const transporter = nodemailer.createTransport({
    service: 'Gmail',
    auth: {
        user: 'your-email@gmail.com',
        pass: 'your-email-password'
    }
});

app.post('/api/book', (req, res) => {
    const bookingDetails = req.body;

    const mailOptions = {
        from: 'your-email@gmail.com',
        to: 'recipient-email@example.com',
        subject: 'Booking Confirmation',
        text: `You have booked the following venue:\n\n${JSON.stringify(bookingDetails, null, 2)}`
    };

    transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
            return res.status(500).send('Failed to send email');
        }
        res.send('Booking successful');
    });
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
