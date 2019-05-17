---
layout: page
---

# GoF Template method pattern


Sample Code of GoF Template Method Pattern

I recommend you to test this code at the following site.
http://www.typescriptlang.org/Playground

```ts
abstract class AbstractLetter {
    protected senderName: string;
    protected recipientName: string;
    protected content: string;
    constructor(
        senderName: string, recipientName: string, content: string) {
        this.senderName    = senderName;
        this.recipientName = recipientName;
        this.content       = content;
    }
    
    protected abstract openGreeting(): string;
    protected abstract closingGreeting(): string;
    protected abstract recipientDescription(): string;
    
    compile(): string {
        return this.recipientDescription() + "\n\n" +
            this.openGreeting() + "\n\n" +
            this.content + "\n\n" +
            this.closingGreeting();
    }
}

class PoliteLetter extends AbstractLetter {
    protected recipientDescription(): string {
        return this.recipientName + "様";
    }
    protected openGreeting(): string {
        return "お世話になっております。 " + this.senderName + "です。";
    }
    protected closingGreeting(): string {
        return "大変恐縮ですがよろしくおねがいいたします。";
    }
}

class WildLetter extends AbstractLetter {
    protected recipientDescription(): string {
        return this.recipientName + "くん";
    }
    protected openGreeting(): string {
        return "ハロー";
    }
    protected closingGreeting(): string {
        return "よろしく！";
    }
}

class Main {
    static main() {
        var content: string = "貸した1000円返してください。";
        var senderName: string = "雨田";
        var recipientName: string = "堀田";

        var politeLetter: AbstractLetter =
            new PoliteLetter(senderName, recipientName, content);
        this.addPreTag(politeLetter.compile());
        
        var wildLetter: AbstractLetter =
            new WildLetter(senderName, recipientName, content);
        this.addPreTag(wildLetter.compile());
    }
    
    protected static addPreTag(content): void {
        var bodyTag = document.getElementById('output');
        var preTag = document.createElement('pre');
        preTag.innerHTML = content;
        bodyTag.appendChild(preTag);
    }
}

Main.main();
```
