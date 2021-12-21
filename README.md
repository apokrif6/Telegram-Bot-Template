# Telegram-Bot-Template

Hi! It's my own **Telegram bot api** PHP template.
There are few systems, such as integration with MySQL Database, autoloader and simple error handler.

# Files

You could find there:

- **BotManager** - main class. You also can put in constructor your own Integration, and use it from manager,
- **Configs** - currently there is only Telegram Bot Token, buy you also put there anything you need.
- **DatabaseInteraction** - class to work with any mysql queries. Contains PDO connection and executing queries.
- **DBConfig** - create config with data to connection for database with using runtime.php file.
- **RequestsCases** - class, which contains text cases.
- **ResponseCases** - like RequestCases, but should be used with Responses to Bot.
- **TelegramInteraction** - class with basic function.

# How to use
It's so simple, imho ;D
Just use (without quotes)
>**https://api.telegram.org/bot'TOKEN'/setwebhook?url='SERVER_URL'**
>
in your browser, to set webhook.

So next, you can find a switch in BotManager.
You should go to RequestCases.php, create your own constant with needed requests,
go back to Manager, find switch with requests, add your new case, and create a function, by using Telegram and Database
integrations.

# I hope it will helpful for you! Good luck! :)