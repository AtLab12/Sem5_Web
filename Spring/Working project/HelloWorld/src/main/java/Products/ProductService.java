package Products;
import java.util.UUID;

import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.List;

@Service
public class ProductService {
    ArrayList<Product> productList= new ArrayList<>();

    public  ProductService() {

    }

    public void seed() {
        productList.add(new Product(UUID.randomUUID().toString(),"Milk",1.0,5.5,"Liquid"));
        productList.add(new Product(UUID.randomUUID().toString(),"Water",0.5,8.5,"Liquid"));
        productList.add(new Product(UUID.randomUUID().toString(),"Cheese",1.3,3.2,"Non liquid"));
    }

    private boolean isEmpty() {
        return productList.size() == 0;
    }

    public List<Product> getAllProducts() {
        return productList;
    }

    public Product getProductById(String id) {
        for(Product product:productList){
            if(product.getId().equals(id))
                return product;
        }
        return null;
    }

    public void addProduct(Product product) {
        productList.add(product);
    }

    public Product getProduct(Product product){
        return getProductById(product.getId());
    }

    public void updateProduct(Product product) {
        deleteProduct(product);
        productList.add(product);
    }

    public void deleteProduct(Product product) {
        productList.remove(getProductById(product.getId()));
    }

    public  void deleteProductById(String id) {
        productList.remove(getProductById(id));
    }
}
