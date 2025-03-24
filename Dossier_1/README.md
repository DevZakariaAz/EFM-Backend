Below is the translated text:

---

# 🧪 **Laravel Test – Day 1: Development of a Dynamic Module**

## 🧩 **General Context**

You are tasked with developing an **autonomous Laravel module** named `PkgWidget`, located in the `modules/` directory, following a custom modular architecture.

This module should enable you to:

-   Manage **dynamic widgets** on a dashboard
-   Associate each widget with a **business logic method** contained in a Service class
-   Dynamically execute these methods and display their result as a widget (value or list)

Your development must comply with **Laravel standards** and follow the structure below:

### 📦 Expected Module Structure:

```
modules/
└── PkgWidget/
    ├── Controllers/
    ├── Models/
    ├── Views/
    ├── App/
    │   ├── Services/
    │   └── Requests/
    └── lang/
```

The module must be **declared via a custom Service Provider**.

---

## ❗️**Access Condition for the Rest of the Test**

🔒 **Question 1** (Prototype) is **eliminatory**:

-   If you score **at least 4/5**, you can move on to Folders 2 and 3. The final grade will be based on **40 points**.
-   If you score **less than 4/5**, you will have to **change the topic** for a new test.
    -   The score obtained for question 1 is kept (out of 5)
    -   The other parts will be **graded out of 35 points** with a new theme.

📌 Folders 2 and 3 are carried out as **live coding**, in the presence of an evaluating trainer.

---

# 📁 **Folder 1 – Functional Prototype (Modular)**

📖 _Documentation allowed_

### 🧮 Maximum Score: 5 points

### ⏱️ Duration: 45 minutes

### 🎯 Objective:

Create a simple prototype in the `PkgWidget` module, demonstrating your ability to **dynamically execute a method** from a Service class, based on user input.

### 🔹 Questions to Address:

#### Q1.1 – Create a class `WidgetService` in `App/Services/` containing two public methods:

-   `getNombreApprenant()` → returns an array or an object with a title and a value
-   `getApprenantsActifs()` → returns a title, a list of 5 learners, and the total count
    **(0.5 pt)**

#### Q1.2 – Create a test page in `Views/`, containing a form with a field `method_name` (name of the method to execute)

**(0.5 pt)**

#### Q1.3 – Dynamically call the method via `call_user_func` in a module controller, and display the result

**(1.5 pt)**

#### Q1.4 – Handle errors with a `try/catch` block, and display a message if the method does not exist

**(1 pt)**

#### Q1.5 – Clearly display the widgets according to their type (value or list)

**(1.5 pt)**

---

# 📁 **Folder 2 – One Page CRUD**

### 🧮 Maximum Score: 15 points

### ⏱️ Duration: 1 hour

### 🎯 Objective:

Continue the work started in Folder 1 (branch `Dossier-2`) by implementing a **One Page CRUD** to manage the widgets in the `PkgWidget` module.

### 🔹 Questions to Address:

#### Q2.1 – Create the `Widget` model in `Models/` with an appropriate migration (`name`, `method`, `type`, etc.)

**(2 pts)**

#### Q2.2 – Implement CRUD actions in a module controller (`Controllers/`)

**(5 pts)**

#### Q2.3 – Use **modals** for the creation, editing, and deletion forms, without reloading the page

**(4 pts)**

#### Q2.4 – Create a class `WidgetRequest` in `App/Requests/` to validate the data:

-   The `method` field is required
-   The `type` field must be equal to `"number"` or `"list"`
    **(2 pts)**

#### Q2.5 – Translate the labels (`name`, `method`, `type`) and the error messages in the files `lang/en/widget.php` and `lang/fr/widget.php`

**(2 pts)**

---

# 📁 **Folder 3 – Dynamic Dashboard**

### 🧮 Maximum Score: 20 points

### ⏱️ Duration: 1h30

### 🎯 Objective:

Dynamically display the widgets in a dashboard by calling the **business methods of the `WidgetService` class**.

### 🔹 Questions to Address:

#### Q3.1 – Add an additional business method in `WidgetService`:

-   `getNombreApprenantsParNomFamille()` → returns a title + a list containing the number of learners for each last name
    **(2 pts)**

#### Q3.2 – When creating a widget, allow the user to input:

-   The name of the method
-   The type of widget (`number` or `list`)
    **(3 pts)**

#### Q3.3 – In the dashboard, dynamically execute the method associated with each widget

**(4 pts)**

#### Q3.4 – Properly display the results:

-   Widgets of type `number` in a **card**
-   Widgets of type `list` in a **styled list or an HTML table**
    **(5 pts)**

#### Q3.5 – Properly handle execution errors (e.g., non-existent method) without breaking the display

**(3 pts)**

#### Q3.6 – Evaluate the quality of the code:

-   Good separation of concerns (controller / service / view)
-   Clear and structured naming of classes, methods, and variables
-   The possible presence of useful comments
    **(3 pts)**

---

## ✅ **Summary of Scores**

| Folder    | Description                             | Score   |
| --------- | --------------------------------------- | ------- |
| Folder 1  | Functional Prototype (access condition) | /5      |
| Folder 2  | One Page CRUD in the module             | /15     |
| Folder 3  | Dynamic Dashboard (Service + View)      | /20     |
| **Total** |                                         | **/40** |

---
