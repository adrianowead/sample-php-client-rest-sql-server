
CREATE TABLE [dbo].[sw_planet](
	[id] [int] NOT NULL,
	[name] [nvarchar](50) NOT NULL,
	[diameter] [decimal](10, 2) NULL,
	[rotation_period] [decimal](10, 2) NULL,
	[orbital_period] [decimal](10, 2) NULL,
	[gravity] [nvarchar](50) NOT NULL,
	[population] [int] NULL,
	[climate] [nvarchar](50) NULL,
	[terrain] [nvarchar](50) NULL,
	[surface_water] [nvarchar](50) NOT NULL,
	[created] [datetime] NULL,
	[edited] [datetime] NULL,
 CONSTRAINT [PK_sw_planet] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO


CREATE TABLE [dbo].[sw_people](
	[id] [int] NOT NULL,
	[name] [nvarchar](50) NULL,
	[height] [decimal](10, 2) NULL,
	[mass] [decimal](10, 2) NULL,
	[hair_color] [nchar](10) NULL,
	[skin_color] [nchar](10) NULL,
	[eye_color] [nchar](10) NULL,
	[birth_year] [int] NULL,
	[gender] [nchar](10) NULL,
	[homeworld] [int] NOT NULL,
	[created] [datetime] NULL,
	[edited] [datetime] NULL,
 CONSTRAINT [PK_sw_people] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[sw_people]  WITH CHECK ADD  CONSTRAINT [FK_sw_people_sw_planet] FOREIGN KEY([homeworld])
REFERENCES [dbo].[sw_planet] ([id])
GO

ALTER TABLE [dbo].[sw_people] CHECK CONSTRAINT [FK_sw_people_sw_planet]
GO



CREATE TABLE [dbo].[sw_starship](
	[id] [int] NOT NULL,
	[name] [nvarchar](50) NULL,
	[model] [nvarchar](50) NULL,
	[starship_class] [nvarchar](50) NULL,
	[manufacturer] [nvarchar](50) NULL,
	[cost_in_credits] [int] NULL,
	[length] [decimal](10, 2) NULL,
	[crew] [int] NULL,
	[passengers] [int] NULL,
	[max_atmosphering_speed] [int] NULL,
	[hyperdrive_rating] [decimal](10, 2) NULL,
	[MGLT] [int] NULL,
	[cargo_capacity] [int] NULL,
	[consumables] [nvarchar](50) NULL,
	[created] [datetime] NOT NULL,
	[edited] [datetime] NOT NULL,
 CONSTRAINT [PK_sw_starship] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO




CREATE TABLE [dbo].[sw_pilot](
	[starhip_id] [int] NOT NULL,
	[people_id] [int] NOT NULL
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[sw_pilot]  WITH CHECK ADD  CONSTRAINT [FK_sw_pilot_sw_people] FOREIGN KEY([people_id])
REFERENCES [dbo].[sw_people] ([id])
GO

ALTER TABLE [dbo].[sw_pilot] CHECK CONSTRAINT [FK_sw_pilot_sw_people]
GO

ALTER TABLE [dbo].[sw_pilot]  WITH CHECK ADD  CONSTRAINT [FK_sw_pilot_sw_starship] FOREIGN KEY([starhip_id])
REFERENCES [dbo].[sw_starship] ([id])
GO

ALTER TABLE [dbo].[sw_pilot] CHECK CONSTRAINT [FK_sw_pilot_sw_starship]
GO

