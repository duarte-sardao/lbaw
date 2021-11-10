# ER: Requirements Specification Component

> Project vision.

## A1: Grab n' Build

The main goal of ***Grab n’ Build*** is to set up a web-based store to manage the listing and sale of computer parts, as well as their buyers. The store can be used by amateurs or professional computer enthusiasts building their computers.

All users, including guests, have the ability to Login and Logout, register a new account, recover passwords or delete their accounts, according to business rules, their data is kept but made anonymous. Users are also given access to search features, such as exact match search, full-text search, search over multiple attributes, search filters, with the ability to order results by characteristics such as price, the ability to list products and browse them by categories, view product details and reviews and manage a shopping cart by adding and removing products. Users are separated into two groups: ***System Administrators*** and ***Consumers***.

***System Administrators*** have, aside from default user permissions, the ability to administer other accounts (search, view, edit, create, block, unblock and delete). Aside from managing accounts, administrators can manage stock, add/delete products and manage their information, stock, category and discounts, as well as view their sales statistics. They can also view users' purchase histories and manage their orders and reports. This group is also in charge of editing some of the website’s pages like About, Contacts and FAQs. Although Administrators have their own accounts, they do not possess authenticated user privileges such as having a shopping cart or wishlist.

***Consumers*** are able to manage their shopping cart by adding or deleting items on it. Both authenticated and unauthenticated users can do it, but only those who possess an account are able to check-out. ***Consumers*** can also be split into two different actors: ***Guests*** and ***Authenticated Users***.

***Guests*** are unauthenticated users who have the ability to create an account (if they haven’t been registered into the system yet) and login into their own accounts.

***Authenticated Users*** have accounts, linked to a profile that can be viewed and edited by the owner, supporting a wishlist and personal notifications (which should inform of payment approval, change in the order processing stage, a wishlist product being made available and an update to the price of a product in their cart). When creating an order, this group of users should be able to change between multiple payment methods. Every purchase should be able to be viewed on a complete history.

If one places an order, the ***Buyer*** should be capable to check, track or even cancel the order if needed. 

***Reviewers*** are Buyers who can post a review about a product they acquired. Reviews should be treated not only editable (by the owner), but also deletable as well (by both review owner and System Administrators). 

The system should also support Help features such as placeholders for forms, contextual error messages and help, as well as Product Information: an “About Us”, listing of main features and contacts.

---


## A2: Actors and User stories

> Brief presentation of the artefact goals.


### 1. Actors

> Diagram identifying actors and their relationships.  
> Table identifying actors, including a brief description.


### 2. User Stories

> User stories organized by actor.  
> For each actor, a table containing a line for each user story, and for each user story: an identifier, a name, a priority, and a description (following the recommended pattern).

#### 2.1. Actor 1

#### 2.2. Actor 2

#### 2.N. Actor n


### 3. Supplementary Requirements

> Section including business rules, technical requirements, and restrictions.  
> For each subsection, a table containing identifiers, names, and descriptions for each requirement.

#### 3.1. Business rules

#### 3.2. Technical requirements

#### 3.3. Restrictions


---


## A3: Information Architecture

The Information Architecture artefact provides a high-level overview of the system's information architecture. 
The main objectives are listed below:
- Contribute to the identification and description of user needs, as well as the generation of new ones;
- Examine and test the UI of the product;
- Allow for several iterations of the user interface design in a short amount of time.

There are two components to this artefact:
- A sitemap;
- A pair of wireframes.



### 1. Sitemap

> Sitemap presenting the overall structure of the web application.  
> Each page must be identified in the sitemap.  
> Multiple instances of the same page (e.g. student profile in SIGARRA) are presented as page stacks.


### 2. Wireframes

A website wireframe is a visual representation of a website’s skeleton architecture. Below there are two wireframes, one is a representation of what the item page resembles, while the other one reveals how the user profile looks like.

#### UIxx: Page Name

![UIxx](images/Wireframe_1.png)

1. Breadcrumbs help the user navigate the website, making them aware of their current location within the website; 
2. The search feature is available throughout the whole website;
3. The selected tab is distinguishable from the unselected one due to its size.
4. Buyers can easily add products to their wishlist, as well as their cart; 


#### UIxx: Page Name

![UIxx](images/Wireframe_2.png)

1. Breadcrumbs help the user navigate the website, making them aware of their current location within the website; 
2. The search feature is available throughout the whole website;
3. The selected tab is distinguishable from the unselected one due to its size.

---


## Revision history

Changes made to the first submission:
1. Item 1
1. ...

***
GROUP2175, 10/11/2021

* Group member 1 Carlos Veríssimo, up201907716 (Editor)
* Group member 2 Duarte Sardão, up201905497
* Group member 3 Nuno Jesus, up201905477
* Group member 4 Tomás Torres, up201800700 
