package Products;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;

import java.util.Date;
import java.util.List;
import java.util.Locale;

@Controller
public class ProductController {
    private final ProductService productService;

    public  ProductController(ProductService productService){
        this.productService = productService;
    }

    @GetMapping("/product/")
    public String home(Locale locale, Model model){
        Date date = new Date();
        List<Product> productList = productService.getAllProducts();
        model.addAttribute("productList", productList);
        model.addAttribute("categoryList", productService.getAllCategories());
        return "product/index";
    }

    @GetMapping("/product/seed")
    public String seed() {
        productService.seed();
        return "redirect:/product/";
    }

    @GetMapping("/product/add")
    public String add(Model model){
        model.addAttribute("product", new Product());
        return "product/add";
    }

    @PostMapping("/product/add")
    public String add(@ModelAttribute Product product){
        productService.addProduct(product);
        return "redirect:/product/";
    }

    @GetMapping("/product/remove")
    public String remove(@RequestParam("id") String id) {
        productService.deleteProductById(id);
        return "redirect:/product/";
    }

    @GetMapping("/product/details")
    public String details(@RequestParam("id") String id, Model model) {
        model.addAttribute("product", productService.getProductById(id));
        return "product/details";
    }

    @GetMapping(value = {"/product/{id}/edit"})
    public String edit(Model model, @PathVariable String id){
        model.addAttribute("product", productService.getProductById(id));
        return "product/edit";
    }

    @PostMapping(value = {"/product/edit"})
    public String edit(@ModelAttribute Product product) {
        productService.updateProduct(product);
        return "redirect:/product/";
    }

    

    @GetMapping(value = {"/category/{id}/edit"})
    public String editCategory(Model model, @PathVariable String id){
        model.addAttribute("category", productService.getCategoryById(id));
        return "category/edit";
    }

    @PostMapping(value = {"/category/add"})
    public String addCategory(@ModelAttribute Category category){
        productService.addCategory(category);
        return "redirect:/product/";
    }

    @PostMapping(value = {"/category/delete"})
    public String deleteCategory(@ModelAttribute Category category){
        productService.deleteCategory(category);
        return "redirect:/product/";
    }

    @PostMapping(value = {"/category/edit"})
    public String editCategory(@ModelAttribute Category category) {
        productService.updateCategory(category);
        return "redirect:/product/";
    }


}
