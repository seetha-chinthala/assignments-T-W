self.onmessage = () => {
        let n = 10;
        var sum = 0;
        for (i = 0; i < n; i++) {
            sum += i;
        }
        // console.log(sum)
        self.postMessage(sum)
    }
    //self.postMessage()