/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/11/2023 21:33:12                          */
/*==============================================================*/


drop table if exists cart_items;

drop table if exists categories;

drop table if exists customers;

drop table if exists order_details;

drop table if exists orders;

drop table if exists payment_methods;

drop table if exists plants;

drop table if exists roles;

drop table if exists staffs;

drop table if exists suppliers;

/*==============================================================*/
/* Table: cart_items                                            */
/*==============================================================*/
create table cart_items
(
   customer_id          int not null,
   plant_id             int not null,
   cart_item_qty        int not null,
   primary key (customer_id, plant_id)
);

/*==============================================================*/
/* Table: categories                                            */
/*==============================================================*/
create table categories
(
   category_id          int not null auto_increment,
   category_name        varchar(50) not null,
   primary key (category_id)
);

/*==============================================================*/
/* Table: customers                                             */
/*==============================================================*/
create table customers
(
   customer_id          int not null auto_increment,
   customer_name        varchar(255) not null,
   customer_phone       varchar(17) not null,
   customer_email       varchar(255) not null,
   customer_password    varchar(255) not null,
   customer_photo       varchar(255),
   primary key (customer_id)
);

/*==============================================================*/
/* Table: order_details                                         */
/*==============================================================*/
create table order_details
(
   order_detail_id      int not null auto_increment,
   order_id             int not null,
   plant_id             int not null,
   order_detail_qty     int not null,
   order_detail_unit_price int not null,
   primary key (order_detail_id)
);

/*==============================================================*/
/* Table: orders                                                */
/*==============================================================*/
create table orders
(
   order_id             int not null auto_increment,
   customer_id          int not null,
   payment_method_id    int not null,
   order_date           date not null,
   order_status         varchar(50) not null,
   order_total_price    int not null,
   primary key (order_id)
);

/*==============================================================*/
/* Table: payment_methods                                       */
/*==============================================================*/
create table payment_methods
(
   payment_method_id    int not null auto_increment,
   payment_method_name  varchar(255) not null,
   payment_method_number varchar(50) not null,
   payment_method_bank  varchar(50) not null,
   payment_method_logo  varchar(255) not null,
   primary key (payment_method_id)
);

/*==============================================================*/
/* Table: plants                                                */
/*==============================================================*/
create table plants
(
   plant_id             int not null auto_increment,
   supplier_id          int not null,
   category_id          int not null,
   plant_name           varchar(255) not null,
   plant_price          int not null,
   plant_stock          int not null,
   plant_photo          varchar(255) not null,
   primary key (plant_id)
);

/*==============================================================*/
/* Table: roles                                                 */
/*==============================================================*/
create table roles
(
   role_id              int not null auto_increment,
   role_name            varchar(50) not null,
   primary key (role_id)
);

/*==============================================================*/
/* Table: staffs                                                */
/*==============================================================*/
create table staffs
(
   staff_id             int not null auto_increment,
   role_id              int not null,
   staff_name           varchar(255) not null,
   staff_phone          varchar(17) not null,
   staff_email          varchar(255) not null,
   staff_password       varchar(255) not null,
   staff_photo          varchar(255),
   primary key (staff_id)
);

/*==============================================================*/
/* Table: suppliers                                             */
/*==============================================================*/
create table suppliers
(
   supplier_id          int not null auto_increment,
   supplier_name        varchar(255) not null,
   supplier_phone       varchar(17) not null,
   supplier_address     text not null,
   primary key (supplier_id)
);

alter table cart_items add constraint FK_cart_item_customer foreign key (customer_id)
      references customers (customer_id) on delete restrict on update restrict;

alter table cart_items add constraint FK_cart_item_plant foreign key (plant_id)
      references plants (plant_id) on delete restrict on update restrict;

alter table order_details add constraint FK_order_detail_order foreign key (order_id)
      references orders (order_id) on delete restrict on update restrict;

alter table order_details add constraint FK_order_detail_plant foreign key (plant_id)
      references plants (plant_id) on delete restrict on update restrict;

alter table orders add constraint FK_customer_order foreign key (customer_id)
      references customers (customer_id) on delete restrict on update restrict;

alter table orders add constraint FK_payment_method_order foreign key (payment_method_id)
      references payment_methods (payment_method_id) on delete restrict on update restrict;

alter table plants add constraint FK_category_plant foreign key (category_id)
      references categories (category_id) on delete restrict on update restrict;

alter table plants add constraint FK_plant_supplier foreign key (supplier_id)
      references suppliers (supplier_id) on delete restrict on update restrict;

alter table staffs add constraint FK_role_staff foreign key (role_id)
      references roles (role_id) on delete restrict on update restrict;

