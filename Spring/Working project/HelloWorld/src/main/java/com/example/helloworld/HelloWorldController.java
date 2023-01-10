
package com.example.helloworld;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class HelloWorldController {
    @RequestMapping("/") public String hello(){ return "hello";


    }
}