<?= $this->extend('Component/user.php') ?>

<?= $this->section('Content') ?>
<style>
    body {
        background-color: #f8f9fa;
    }

    .chat-header {
        background-color: #007bff;
        color: #fff;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .chat-body {
        height: 400px;
        display: flex;
        flex-direction: column-reverse;
        overflow-y: auto;
        padding: 15px;
        background-color: #e9ecef;
    }

    .message {
        margin-bottom: 10px;
    }

    .message.sent {
        text-align: right;
    }

    .message-bubble {
        display: inline-block;
        padding: 10px;
        border-radius: 15px;
        max-width: 70%;
    }

    .message.sent .message-bubble {
        background-color: #007bff;
        color: #fff;
    }

    .message.received .message-bubble {
        background-color: #f1f1f1;
        color: #000;
    }

    .chat-footer {
        background-color: #fff;
        padding: 10px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top: 1px solid #dee2e6;
    }

    /* Custom Scrollbar */
    .chat-body::-webkit-scrollbar {
        width: 8px;
    }

    .chat-body::-webkit-scrollbar-thumb {
        background: #007bff;
        border-radius: 4px;
    }

    .chat-body::-webkit-scrollbar-track {
        background: #e9ecef;
    }
    .mt-6{
        margin-top: 100px;
    }
</style>
<div class="container mt-6">
    <div class="card">
        <!-- Header -->
        <div class="chat-header d-flex justify-content-between align-items-center p-3">
            <div>
                <h6 class="mb-0 h4"><?= $order['title'] ?></h6>
            </div>
        </div>
        <!-- Body -->
        <div class="chat-body">
            <!-- Messages -->
            <div class="message received">
                <div class="message-bubble">Hi there! How can I help you today?</div>
            </div>
            <div class="message sent">
                <div class="message-bubble">Hello! I have a question about your service.</div>
            </div>
            <div class="message received">
                <div class="message-bubble">Sure! Please tell me your query.</div>
            </div>
            <div class="message sent">
                <div class="message-bubble">What are your operating hours?</div>
            </div>
            <div class="message received">
                <div class="message-bubble">We are open from 9:00 AM to 9:00 PM, Monday to Friday.</div>
            </div>
            <div class="message sent">
                <div class="message-bubble">What are your operating hours?</div>
            </div>
            <div class="message received">
                <div class="message-bubble">We are open from 9:00 AM to 9:00 PM, Monday to Friday.</div>
            </div>
            <div class="message sent">
                <div class="message-bubble">What are your operating hours?</div>
            </div>
            <div class="message received">
                <div class="message-bubble">We are open from 9:00 AM to 9:00 PM, Monday to Friday.</div>
            </div>
            <div class="message sent">
                <div class="message-bubble">What are your operating hours?</div>
            </div>
            <div class="message received">
                <div class="message-bubble">We are open from 9:00 AM to 9:00 PM, Monday to Friday.</div>
            </div>
            <div class="message sent">
                <div class="message-bubble">What are your operating hours?</div>
            </div>
            <div class="message received">
                <div class="message-bubble">We are open from 9:00 AM to 9:00 PM, Monday to Friday.</div>
            </div>
        </div>
        <!-- Footer -->
        <div class="chat-footer d-flex align-items-center">
            <input type="text" class="form-control me-2" placeholder="Type a message">
            <button class="btn btn-primary"><i class="bi bi-send"></i> Send</button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>