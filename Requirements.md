# Requirements
## Basic requirements

The system developed conforms to the description.
- [x] The system has to be developed by the student (or group of students) and not downloaded from GitHub
or any other source.
- [x] System data is stored in a database (typically a SQL or NoSQL storage). If the database isrelational, it must
contain not less than 4 related tables and must be designed in 3rd normal form.
- [x] The system conforms to MVC approach. User interface layer is separated from business logic and from
data storage using appropriate MVC means.
- [x] The system developed is non-trivial (not blog with 1 form), by adding some additional effort, one could
create a usable web application. All 4 CRUD functions (create, read, update, and delete) must be
implemented.
- [x] Localization pattern is applied in the system, users can switch languages.
- [x] The system has user authentication mechanism. Each registered user is included in some role, permissions
are assigned to user roles. At least two roles of registered users must be implemented. The permissions
assigned to all roles and to quest users must be different.
- [x] User passwords are not stored in plain text.
- [x] HTML and CSS validates. It is requirement from “Web technologies I” course.
- [x] UTF-8 text encoding is used throughout the system.
- [x] "Nice URLs" are used in the system (addresses do not contain script names, e.g., index.php, GET
parameters are not used when not appropriate).
- [x] Version control is used (also for applications developed by a single developer). There are at least 3
commits with different timestamps and different functioning versions of the developed system. Git is
expected to be used if you don't have previous experience with version control. Indicates that
development took at least 3 different sessions and was not committed only after completion.

## Advanced requirements
Fulfilling any single requirement provides no more than 5% of the final grade:
- [ ] The system provides a personalization mechanism (e.g., in a social network system user may choose
what's shown on the first page – most recent items or most interesting items).
- [ ] The system adapts to user actions by providing content suitable to a current user (e.g., views like “my
recent requests”, “other users who were looking for this book, opened this item as well...”)
- [x] The system stores audit logs of user actions. Third party plug-ins are not evaluated for this requirement.
- [x] The system adjusts to user's “accept-language” and automatically provides content in the most
appropriate language.
- [x] The system includes communication interfaces other than standard web / HTML (for instance, email
notifications, RSS or ATOM feeds, RESTful interface, SOAP web services).
- [x] The system utilizes file manipulation (upload, processing, display / download, e.g., image gallery, data
import, file format conversion).
- [x] AJAX mechanism is used

## i-option requirements
In addition to the basic and advanced requirements, the following 3requirements must be fulfilled:
- [x] The system is deployed to an Internet-connected host and demonstrated using delegated domain /
subdomain in the browser on a separate computer.
- [x] Protection against CSRF / XSRF attacks must be built into the system.
- [x] The algorithm or method used for protection must be described in the description students submit in
March.
