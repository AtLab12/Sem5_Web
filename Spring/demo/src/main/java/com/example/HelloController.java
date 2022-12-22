package com.example;

import lombok.Data;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.namedparam.MapSqlParameterSource;
import org.springframework.jdbc.core.namedparam.NamedParameterJdbcTemplate;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class HelloController {
    @Autowired
    NamedParameterJdbcTemplate jdbcTemplate;

    @RequestMapping("/")
    String hello() {
        return "Hello World!";
    }

    @RequestMapping("/A")
    public String information(Model model){
        model.addAttribute("products", new Produkt[3]);
        return "hello";
    }

    @Data
    static class Result {
        private final int left;
        private final int right;
        private final long answer;
    }

    // SQL sample
    


class Produkt {
    String nazwa;
    Float waga;
    Float cena;
    int index;
    String kategoria;

    Produkt(){
        nazwa = "nazwa";
        waga = 0.0f;
        cena = 0.0f;
        index = 0;
        kategoria = "kategoria";
    }
}
}