package Products;
import java.util.UUID;

import org.bson.Document;
import org.springframework.stereotype.Service;

import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import static com.mongodb.client.model.Filters.eq;
import com.google.gson.Gson;
import com.mongodb.MongoClient;
import com.mongodb.client.FindIterable;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import com.mongodb.client.model.Projections;
import com.mongodb.client.model.Sorts;

@Service
public class ProductService {
    ArrayList<Product> productList= new ArrayList<>();
    MongoClient dbclient = new MongoClient("localhost", 27017);
    MongoDatabase db = dbclient.getDatabase("test");
    Gson gson = new Gson();
    public  ProductService() {
 
    }

    /**
     * 
     */
    public void seed() {

        productList.add(new Product(UUID.randomUUID().toString(),"Milk",1.0,5.5,"Liquid"));
        productList.add(new Product(UUID.randomUUID().toString(),"Water",0.5,8.5,"Liquid"));
       productList.add(new Product(UUID.randomUUID().toString(),"Cheese",1.3,3.2,"Non liquid"));
        MongoCollection collection = db.getCollection("products");
        FindIterable<Document> re = collection.find();
        Iterator it = re.iterator();
    
        while (it.hasNext()) {
            Document temp = (Document) it.next();

            productList.add(gson.fromJson(temp.get("product").toString(), Product.class));
        }
       
        
        for (Product product : productList) {
            Document doc = new Document("name", product.getName())
                .append("product", gson.toJson(product));
            collection.insertOne(doc);
        }
        
    }

    private boolean isEmpty() {
        return db.getCollection("products").count() == 0;
    }

    public List<Product> getAllProducts() {
        var ret = new ArrayList<Product>();
        var iter = db.getCollection("products").find().iterator();
        while (iter.hasNext()) {
            var doc = iter.next();
            ret.add(gson.fromJson(doc.get("product").toString(), Product.class));
        }
        return ret;

    }

    public Product getProductById(String id) {
        var ret = new ArrayList<Product>();
        var iter =  db.getCollection("products").find(eq("id",id)).iterator();
        while (iter.hasNext()) {
            var doc = iter.next();
            ret.add(gson.fromJson(doc.get("product").toString(), Product.class));
        }
        return ret.get(0);
    }

    public void addProduct(Product product) {
        db.getCollection("products").insertOne(new Document("product", gson.toJson(product)));
    }

    public Product getProduct(Product product){
        return getProductById(product.getId());
    }

    public void updateProduct(Product product) {
        var iter = db.getCollection("products").find(eq("id",product.getId())).iterator();
        while (iter.hasNext()) {
            var doc = iter.next();
            db.getCollection("products").updateOne(doc, new Document("product", gson.toJson(product)));
        }
    }

    public void deleteProduct(Product product) {
        deleteProductById(product.getId());
    }

    public  void deleteProductById(String id) {
        var iter = db.getCollection("products").find(eq("id",id)).iterator();
        while (iter.hasNext()) {
            var doc = iter.next();
            db.getCollection("products").deleteOne(doc);
        }
    }

    public void addCategory(Category category) {
        var doc = new Document("id", category.getId()).append("category", gson.toJson(category));
        db.getCollection("categories").insertOne(doc);
    }

    public List<Category> getAllCategories() {
        var ret = new ArrayList<Category>();
        var iter = db.getCollection("categories").find().iterator();
        while (iter.hasNext()) {
            var doc = iter.next();
            ret.add(gson.fromJson(doc.get("category").toString(), Category.class));
        }
        return ret;
    }

    public Category getCategoryById(String id) {
        var ret = new ArrayList<Category>();
        var iter = db.getCollection("categories").find(eq("id",id)).iterator();
        while (iter.hasNext()) {
            var doc = iter.next();
            ret.add(gson.fromJson(doc.get("category").toString(), Category.class));
        }
        return ret.get(0);
    }


    public void updateCategory(Category category) {
        var id = category.getId();
        var iter = db.getCollection("categories").find(eq("id",id)).iterator();
        while (iter.hasNext()) {
            var doc = iter.next();
            db.getCollection("categories").deleteOne(doc);
            db.getCollection("categories").insertOne(new Document("id", category.getId()).append("category", gson.toJson(category)));
        }
    }


    public void deleteCategory(Category category) {
        deleteCategoryById(category.getId());
    }

    public void deleteCategoryById(String id) {
        var iter = db.getCollection("categories").find(eq("id",id)).iterator();
        String name = "";
        while (iter.hasNext()) {
            var doc = iter.next();
            name = gson.fromJson(doc.get("category").toString(), Category.class).getName();
            db.getCollection("categories").deleteOne(doc);
        }
        iter = db.getCollection("products").find(eq("category",name)).iterator();
        while(iter.hasNext()){
            var doc = iter.next();
            db.getCollection("products").deleteOne(doc);
        }
        
    }
}
