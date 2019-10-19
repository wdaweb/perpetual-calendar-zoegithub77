# 建議事項
1. 主要檔案更名成index.php
2. 有`Fatal error: Uncaught Error: Call to undefined function checkSpecialDay() in D:\50-PHP\10802\homework01\21\perpetual-all.php:131 Stack trace: #0 {main} thrown in D:\50-PHP\10802\homework01\21\perpetual-all.php on line 131`錯誤存在
   - 第172行的`<?` 少加了`php` 應該是`<?php`
   - 如果要使用`<?`的短標籤，請檢查php.ini中是否有開啟短標籤設定
   - 考量程式可能會在各種環境下執行，即使php.ini有開啟短標籤設定，建議還是習慣使用`<?php`做為程式區段的開頭
3. 儘量使用相對路徑來取代絕對路徑
```
  <a href="perpetual-all.php?month=......
    改成
  <a href="?month=.....
```
