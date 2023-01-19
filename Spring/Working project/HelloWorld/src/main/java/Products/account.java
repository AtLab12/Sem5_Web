package Products;
import org.bson.Document;

class Account {
    private String name;
    private String password;
    private Boolean admin;


    public Account(String name, String password, Boolean admin) {
        this.name = name;
        this.password = password;
        this.admin = admin;
    }
    public Account(Document thisDocument) {
        this.name = thisDocument.getString("name");
        this.password = thisDocument.getString("password");
        this.admin = thisDocument.getBoolean("admin");
    }
    /**
     * @return the name
     */
    public String getName() {
        return name;
    }
    /**
     * @param name the name to set
     */
    public void setName(String name) {
        this.name = name;
    }
    /**
     * @return the password
     */
    public String getPassword() {
        return password;
    }
    /**
     * @param password the password to set
     */
    public void setPassword(String password) {
        this.password = password;
    }
    /**
     * @return the admin
     */
    public Boolean getAdmin() {
        return admin;
    }
    /**
     * @param admin the admin to set
     */
    public void setAdmin(Boolean admin) {
        this.admin = admin;
    }
    
    Document getDocument() {
        return new Document("name", name)
            .append("password", password)
            .append("admin", admin);
    }
}